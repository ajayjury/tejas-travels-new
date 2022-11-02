<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PackageType;
use DateTime;

class OutStation extends Model
{
    use HasFactory;
    protected $table="outstations";

    public function State()
    {
        return $this->belongsTo('App\Models\State');
    }
    
    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function Cities()
    {
        return $this->belongsToMany(City::class, 'outstationcities', 'outstation_id');
    }

    public function GetCitiesId(){
        return $this->Cities()->pluck('cities.id')->toArray();
    }

    public function GetCitiesName(){
        return $this->Cities()->pluck('cities.name');
    }

    public function Vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }

    public function VehicleType()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicletype_id');
    }

    public function SpecialFareOutStation()
    {
        return $this->hasMany('App\Models\SpecialFareOutStation', 'outstation_id');
    }

    public function discountAmount($distance, $days) {
        return round(number_format((floatval($this->discount)/100)*(floatval($this->round_price_per_km) * $this->mainDistance($distance, $days)),2,'.',''));
    }
    
    public function gstAmount($distance, $days) {
        return round(number_format((floatval($this->gst)/100)*(floatval($this->round_price_per_km) * $this->mainDistance($distance, $days)),2,'.',''));
    }
    
    public function advanceAmount($distance, $days) {
        return round(number_format((floatval($this->advance_during_booking)/100)*(floatval($this->finalAmount($distance, $days))),2,'.',''));
    }
    
    public function totalAmount($distance, $days) {
        return round(floatval($this->round_price_per_km) * $this->mainDistance($distance, $days));
    }
    
    public function finalAmount($distance, $days) {
        return round(number_format((floatval($this->totalAmount($distance, $days))+(!empty($this->driver_charges_per_day) ? $this->driver_charges_per_day : 0.0))+(floatval($this->gstAmount($distance, $days))-floatval($this->discountAmount($distance, $days))),2,'.',''));
    }

    public function mainDistance($distance, $days) {
        if($days==1){
            if((floatval($distance)*2)>$this->min_km_per_day2){
                $distance = (floatval($distance)*2);
            }else{
                $distance = $this->min_km_per_day2;
            }
        }else{
            if(((floatval($distance)*2)*$days)>($this->min_km_per_day2*$days)){
                $distance = ((floatval($distance)*2)*$days);
            }else{
                $distance = $this->min_km_per_day2 * $days;
            }
        }
        return $distance;
    }

    // public function getAmountArray($distance, $from_date, $to_date=null){
    //     $arr = [];
    //     $arr['round_trip_distance'] = "Round Trip Distance (approx) : <span style='font-weight:900;color:#000;'>".(floatval($distance)*2)."</span> Kms";
    //     if($to_date==null){
    //         $days = 1;
    //     }else{
    //         $date1 = new DateTime(date("Y-m-d", strtotime($from_date)));
    //         $date2 = new DateTime(date("Y-m-d", strtotime($to_date)));
    //         $interval = $date1->diff($date2);
    //         $days = $interval->days;
    //     }
    //     $arr['no_of_days'] = "No of Days : <span style='font-weight:900;color:#000;'>".$days."</span>";
    //     $arr['minimum_km'] = "Minimum Kms: <span style='font-weight:900;color:#000;'>".$this->min_km_per_day2."</span> kms.";
    //     $arr['total_km'] = "Total effective Kms: <span style='font-weight:900;color:#000;'>".(floatval($distance)*2)."</span> kms.";
    //     $arr['fare_per_km'] = "Fare Per Km : Rs. <span style='font-weight:900;color:#000;'>".$this->round_price_per_km."</span>";
    //     $arr['driver_batta'] = "Driver Allowance Per Day: Rs.<span style='font-weight:900;color:#000;'>".$this->driver_charges_per_day."</span>";
    //     $arr['total_amount'] = "Amount For Effective Kms: Rs.".$this->round_price_per_km." * ".(floatval($distance)*2)." = Rs.<span style='font-weight:900;color:#000;'>".($this->totalAmount($distance))."</span>";
    //     $arr['total_driver_batta'] = "Total Driver Allowance : Rs.<span style='font-weight:900;color:#000;'>".($this->driver_charges_per_day*$days)."</span>(".$this->driver_charges_per_day." * ".$days.")";
    //     $arr['GST'] = "GST (@".$this->gst."%) : Rs.<span style='font-weight:900;color:#000;'>".$this->gstAmount($distance)."</span>";
    //     $arr['estimated_total_fare'] = "Estimated Total Fare : Rs.<span style='font-weight:900;color:#000;'>".($this->totalAmount($distance)+($this->driver_charges_per_day*$days))+$this->gstAmount($distance)."</span>";
    //     $arr['Discount'] = "Discount (@".$this->discount."%) : Rs.<span style='font-weight:900;color:#000;'>".$this->discountAmount($distance)."</span>";
    //     $arr['tejas_price'] = "Tejas Travel's Price : Rs.<span style='font-weight:900;color:#000;'>".$this->finalAmount($distance)."</span>";
    //     $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : Rs.<span style='font-weight:900;color:#000;'>".$this->advanceAmount($distance)."</span>";
    //     $arr['message'] = "New hour billing starts when usage more than 30 mins.";
    //     $arr['final_amount'] = $this->finalAmount($distance);
    //     return $arr;
    // }

    public function getAmountArray($distance, $from_date, $to_date=null){
        $arr = [];
        // $arr['round_trip_distance'] = "Round Trip Distance (approx) : <span style='font-weight:900;color:#000;'>".(floatval($distance)*2)."Kms</span> ";
        if($to_date==null){
            $days = 1;
        }else{
            $date1 = new \DateTime(date("Y-m-d", strtotime($from_date)));
            $date2 = new \DateTime(date("Y-m-d", strtotime($to_date)));
            $interval = $date1->diff($date2);
            $days = $interval->days;
        }
        $arr['round_trip_distance'] = "Round Trip Distance (approx) : <span style='font-weight:900;color:#000;'>".$this->mainDistance($distance, $days)."Kms</span> ";
        $arr['no_of_days'] = "No of Days : <span style='font-weight:900;color:#000;'>".$days."</span>";
        $arr['minimum_km'] = "Minimum Kms: <span style='font-weight:900;color:#000;'>".$this->min_km_per_day2."kms.</span> ";
        $arr['total_km'] = "Total effective Kms: <span style='font-weight:900;color:#000;'>".$this->mainDistance($distance, $days)."kms.</span> ";
        $arr['fare_per_km'] = "Fare Per Km :  <span style='font-weight:900;color:#000;'>Rs. ".$this->round_price_per_km."</span>";
        $arr['driver_batta'] = "Driver Allowance Per Day: <span style='font-weight:900;color:#000;'>Rs.".$this->driver_charges_per_day."</span>";
        $arr['total_amount'] = "Amount For Effective Kms: <span>Rs.".$this->round_price_per_km." * ".$this->mainDistance($distance, $days)."</span> <span style='font-weight:900;color:#000;'>= Rs.".($this->totalAmount($distance, $days))."</span>";
        $arr['total_driver_batta'] = "Total Driver Allowance : <span style='font-weight:900;color:#000;'>Rs.".($this->driver_charges_per_day*$days)."</span>(".$this->driver_charges_per_day." * ".$days.")";
        $arr['GST'] = "GST (@".$this->gst."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->gstAmount($distance, $days)."</span>";
        $arr['estimated_total_fare'] = "Estimated Total Fare : <span style='font-weight:900;color:#000;'>Rs.".($this->totalAmount($distance, $days)+($this->driver_charges_per_day*$days))+$this->gstAmount($distance, $days)."</span>";
        $arr['Discount'] = "Discount (@".$this->discount."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->discountAmount($distance, $days)."</span>";
        $arr['tejas_price'] = "Tejas Travel's Price : <span style='font-weight:900;color:#000;'>Rs. ".$this->finalAmount($distance, $days)."</span>";
        $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : <span style='font-weight:900;color:#000;'>Rs. ".$this->advanceAmount($distance, $days)."</span>";
        $arr['message'] = "New hour billing starts when usage more than 30 mins.";
        $arr['final_amount'] = $this->finalAmount($distance, $days);
        return $arr;
    }
    
    public function getAdminAmountArray($distance, $from_date, $to_date=null){
        $arr = [];
        if($to_date==null){
            $days = 1;
        }else{
            $date1 = new \DateTime(date("Y-m-d", strtotime($from_date)));
            $date2 = new \DateTime(date("Y-m-d", strtotime($to_date)));
            $interval = $date1->diff($date2);
            $days = $interval->days;
        }
        $arr['round_trip_distance'] = "Round Trip Distance (approx) : <span style='font-weight:900;color:#000;'>".$this->mainDistance($distance, $days)."Kms</span> ";
        $arr['no_of_days'] = "No of Days : <span style='font-weight:900;color:#000;'>".$days."</span>";
        $arr['minimum_km'] = "Minimum Kms: <span style='font-weight:900;color:#000;'>".$this->min_km_per_day2."kms.</span> ";
        $arr['total_km'] = "Total effective Kms: <span style='font-weight:900;color:#000;'>".$this->mainDistance($distance, $days)."kms.</span> ";
        $arr['fare_per_km'] = "Fare Per Km :  <span style='font-weight:900;color:#000;'>Rs. ".$this->round_price_per_km."</span>";
        $arr['driver_batta'] = "Driver Allowance Per Day: <span style='font-weight:900;color:#000;'>Rs.".$this->driver_charges_per_day."</span>";
        $arr['total_amount'] = "Amount For Effective Kms: <span>Rs.".$this->round_price_per_km." * ".$this->mainDistance($distance, $days)."</span> <span style='font-weight:900;color:#000;'>= Rs.".($this->totalAmount($distance, $days))."</span>";
        $arr['total_driver_batta'] = "Total Driver Allowance : <span>Rs. ".$this->driver_charges_per_day." * ".$days." days</span><span style='font-weight:900;color:#000;'>Rs".($this->driver_charges_per_day*$days)."</span>";
        $arr['GST'] = "GST (@".$this->gst."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->gstAmount($distance, $days)."</span>";
        $arr['estimated_total_fare'] = "Estimated Total Fare : <span style='font-weight:900;color:#000;'>Rs.".($this->totalAmount($distance, $days)+($this->driver_charges_per_day*$days))+$this->gstAmount($distance, $days)."</span>";
        $arr['Discount'] = "Discount (@".$this->discount."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->discountAmount($distance, $days)."</span>";
        $arr['tejas_price'] = "Tejas Travel's Price : <span style='font-weight:900;color:#000;'>Rs. ".$this->finalAmount($distance, $days)."</span>";
        $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : <span style='font-weight:900;color:#000;'>Rs. ".$this->advanceAmount($distance, $days)."</span>";
        return $arr;
    }

    public function getAdminFinalPrice($distance, $from_date, $to_date=null){
        if($to_date==null){
            $days = 1;
        }else{
            $date1 = new \DateTime(date("Y-m-d", strtotime($from_date)));
            $date2 = new \DateTime(date("Y-m-d", strtotime($to_date)));
            $interval = $date1->diff($date2);
            $days = $interval->days;
        }
        return $this->finalAmount($distance, $days);
    }

    public function checkEnquiry(){
        if($this->booking_type != 1){
            $now = new DateTime();
            $startdate = new \DateTime(date("Y-m-d", strtotime($this->from_date)));
            $enddate = new \DateTime(date("Y-m-d", strtotime($this->to_date)));
            if($startdate <= $now && $now <= $enddate) {
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

}
