<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PackageType;

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

    public function discountAmount($distance) {
        // return $distance;
        return number_format((floatval($this->discount)/100)*(floatval($this->round_price_per_km) * floatval($distance*2)),2,'.','');
    }
    
    public function gstAmount($distance) {
        return number_format((floatval($this->gst)/100)*(floatval($this->round_price_per_km) * floatval($distance*2)),2,'.','');
    }
    
    public function advanceAmount($distance) {
        return number_format((floatval($this->advance_during_booking)/100)*(floatval($this->finalAmount($distance))),2,'.','');
    }
    
    public function totalAmount($distance) {
        return floatval($this->round_price_per_km) * floatval($distance*2);
    }
    
    public function finalAmount($distance) {
        return number_format((floatval($this->totalAmount($distance))+(!empty($this->driver_charges_per_day) ? $this->driver_charges_per_day : 0.0))+(floatval($this->gstAmount($distance))-floatval($this->discountAmount($distance))),2,'.','');
    }

    public function getAmountArray($distance, $from_date, $to_date=null){
        $arr = [];
        $arr['round_trip_distance'] = "Round Trip Distance (approx) : <span style='font-weight:900;color:#000;'>".floatval($distance*2)."</span> Kms";
        if($to_date==null){
            $days = 1;
        }else{
            $date1 = new DateTime(date("Y-m-d", strtotime($from_date)));
            $date2 = new DateTime(date("Y-m-d", strtotime($to_date)));
            $interval = $date1->diff($date2);
            $days = $interval->days;
        }
        $arr['no_of_days'] = "No of Days : <span style='font-weight:900;color:#000;'>".$days."</span>";
        $arr['minimum_km'] = "Minimum Kms: <span style='font-weight:900;color:#000;'>".$this->min_km_per_day2."</span> kms.";
        $arr['total_km'] = "Total effective Kms: <span style='font-weight:900;color:#000;'>".floatval($distance*2)."</span> kms.";
        $arr['fare_per_km'] = "Fare Per Km : Rs. <span style='font-weight:900;color:#000;'>".$this->round_price_per_km."</span>";
        $arr['driver_batta'] = "Driver Allowance Per Day: Rs.<span style='font-weight:900;color:#000;'>".$this->driver_charges_per_day."</span>";
        $arr['total_amount'] = "Amount For Effective Kms: Rs.".$this->round_price_per_km." * ".floatval($distance*2)." = Rs.<span style='font-weight:900;color:#000;'>".($this->totalAmount($distance))."</span>";
        $arr['total_driver_batta'] = "Total Driver Allowance : Rs.<span style='font-weight:900;color:#000;'>".($this->driver_charges_per_day*$days)."</span>(".$this->driver_charges_per_day." * ".$days.")";
        $arr['GST'] = "GST (@".$this->gst."%) : Rs.<span style='font-weight:900;color:#000;'>".$this->gstAmount($distance)."</span>";
        $arr['estimated_total_fare'] = "Estimated Total Fare : Rs.<span style='font-weight:900;color:#000;'>".($this->totalAmount($distance)+($this->driver_charges_per_day*$days))+$this->gstAmount($distance)."</span>";
        $arr['Discount'] = "Discount (@".$this->discount."%) : Rs.<span style='font-weight:900;color:#000;'>".$this->discountAmount($distance)."</span>";
        $arr['tejas_price'] = "Tejas Travel's Price : Rs.<span style='font-weight:900;color:#000;'>".$this->finalAmount($distance)."</span>";
        $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : Rs.<span style='font-weight:900;color:#000;'>".$this->advanceAmount($distance)."</span>";
        $arr['message'] = "New hour billing starts when usage more than 30 mins.";
        $arr['final_amount'] = $this->finalAmount($distance);
        return $arr;
    }
}
