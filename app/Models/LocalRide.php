<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PackageType;
use Illuminate\Http\Request;
use DateTime;

class LocalRide extends Model
{
    use HasFactory;
    protected $table="localrides";

    public function State()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function Cities()
    {
        return $this->belongsToMany(City::class, 'localridecities', 'localride_id');
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

    public function PackageType()
    {
        return $this->belongsTo('App\Models\PackageType', 'packagetype_id');
    }

    public function SpecialFareLocalRide()
    {
        return $this->hasMany('App\Models\SpecialFareLocalRide', 'localride_id');
    }

    public function discountAmount($distance=null) {
        return round(number_format(($this->discount/100)*($this->base_price),2,'.',''));
    }
    
    public function gstAmount($distance=null) {
        return round(number_format(($this->gst/100)*($this->base_price),2,'.',''));
    }
    
    public function advanceAmount($distance=null) {
        return round(number_format(($this->advance_during_booking/100)*($this->finalAmount($distance)),2,'.',''));
    }
    
    public function totalAmount($distance=null) {
        return round($this->base_price);
    }
    
    public function finalAmount($distance=null) {
        return round(number_format((($this->totalAmount($distance)+(!empty($this->driver_charges_per_day) ? $this->driver_charges_per_day : 0.0))-$this->discountAmount($distance))+$this->gstAmount($distance),2,'.',''));
    }

    // public function getAmountArray(){
    //     $arr = [];
    //     $arr['base_price'] = "Base Price : Rs. <span style='font-weight:900;color:#000;'>".$this->base_price."</span>";
    //     $arr['package'] = "Package : <span style='font-weight:900;color:#000;'>".$this->PackageType->name."</span>";
    //     $arr['extra_hours'] = "Extra Hours: Rs. <span style='font-weight:900;color:#000;'>".$this->additional_price_per_hr."</span> per hours.";
    //     $arr['included_hrs'] = "Included Hrs: <span style='font-weight:900;color:#000;'>".$this->included_hr."</span> kms.";
    //     $arr['extra_kms'] = "Extra Kms: Rs. <span style='font-weight:900;color:#000;'>".$this->additional_price_per_km."</span> per km.";
    //     $arr['included_km'] = "Included Kms: <span style='font-weight:900;color:#000;'>".$this->included_km."</span> kms.";
    //     $arr['driver_batta'] = "Driver Batta: Rs. <span style='font-weight:900;color:#000;'>".$this->driver_charges_per_day."</span> after 10 hours/10 PM to 6 PM.";
    //     $arr['message'] = "New hour billing starts when usage more than 30 mins.";
    //     $arr['final_amount'] = $this->finalAmount();
    //     return $arr;
    // }

    public function getAmountArray(){
        $arr = [];
        $arr['base_price'] = "Base Price :  <span style='font-weight:900;color:#000;'>Rs.".round($this->base_price)."</span>";
        $arr['driver_batta_admin'] = "Driver Allowance Per Day: <span style='font-weight:900;color:#000;'>Rs.".$this->driver_charges_per_day."</span>";
        $arr['GST'] = "GST (@".$this->gst."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->gstAmount()."</span>";
        $arr['estimated_total_fare'] = "Estimated Total Fare : <span style='font-weight:900;color:#000;'>Rs.".($this->totalAmount())+$this->gstAmount()+$this->driver_charges_per_day."</span>";
        $arr['Discount'] = "Discount (@".$this->discount."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->discountAmount()."</span>";
        $arr['tejas_price'] = "Tejas Travel's Price : <span style='font-weight:900;color:#000;'>Rs. ".$this->finalAmount()."</span>";
        $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : <span style='font-weight:900;color:#000;'>Rs. ".$this->advanceAmount()."</span>";
        // $arr['base_price'] = $this->where('id',1)->first();
        // $arr['package'] = "Package : <span style='font-weight:900;color:#000;'>".$this->PackageType->name."</span>";
        $arr['extra_hours'] = "Extra Hours:  <span style='font-weight:900;color:#000;'>Rs.".$this->additional_price_per_hr." per hours.</span> ";
        $arr['included_hrs'] = "Included Hrs: <span style='font-weight:900;color:#000;'>".$this->included_hr." kms.</span> ";
        $arr['extra_kms'] = "Extra Kms: <span style='font-weight:900;color:#000;'>Rs. ".$this->additional_price_per_km." per km.</span> ";
        $arr['included_km'] = "Included Kms: <span style='font-weight:900;color:#000;'>".$this->included_km." kms.</span> ";
        $arr['driver_batta'] = "Driver Batta:  <span style='font-weight:900;color:#000;'>Rs.".$this->driver_charges_per_day." after 10 hours/10 PM to 6 PM.</span> ";
        $arr['message'] = "New hour billing starts when usage more than 30 mins.";
        $arr['final_amount'] = $this->finalAmount();
        return $arr;
    }
    
    public function getAdminAmountArray(){
        $arr = [];
        $arr['base_price'] = "Base Price :  <span style='font-weight:900;color:#000;'>Rs.".round($this->base_price)."</span>";
        $arr['driver_batta_admin'] = "Driver Allowance Per Day: <span style='font-weight:900;color:#000;'>Rs.".$this->driver_charges_per_day."</span>";
        $arr['GST'] = "GST (@".$this->gst."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->gstAmount()."</span>";
        $arr['estimated_total_fare'] = "Estimated Total Fare : <span style='font-weight:900;color:#000;'>Rs.".($this->totalAmount())+$this->gstAmount()+$this->driver_charges_per_day."</span>";
        $arr['Discount'] = "Discount (@".$this->discount."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->discountAmount()."</span>";
        $arr['tejas_price'] = "Tejas Travel's Price : <span style='font-weight:900;color:#000;'>Rs. ".$this->finalAmount()."</span>";
        $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : <span style='font-weight:900;color:#000;'>Rs. ".$this->advanceAmount()."</span>";
        $arr['extra_hours'] = "Extra Hours:  <span style='font-weight:900;color:#000;'>Rs.".$this->additional_price_per_hr." per hours.</span> ";
        $arr['included_hrs'] = "Included Hrs: <span style='font-weight:900;color:#000;'>".$this->included_hr." kms.</span> ";
        $arr['extra_kms'] = "Extra Kms: <span style='font-weight:900;color:#000;'>Rs. ".$this->additional_price_per_km." per km.</span> ";
        $arr['included_km'] = "Included Kms: <span style='font-weight:900;color:#000;'>".$this->included_km." kms.</span> ";
        $arr['driver_batta'] = "Driver Batta:  <span style='font-weight:900;color:#000;'>Rs.".$this->driver_charges_per_day." after 10 hours/10 PM to 6 PM.</span> ";
        return $arr;
    }
    
    public function getAmountArrayEmail(){
        $arr = [];
        $arr['base_price'] = array('text'=>"Base Price", 'value'=>"Rs.".round($this->base_price));
        $arr['driver_batta_admin'] = array('text'=>"Driver Allowance Per Day", 'value'=>"Rs.".$this->driver_charges_per_day);
        $arr['GST'] = array('text'=>"GST (@".$this->gst."%)", 'value'=>"Rs.".$this->gstAmount());
        $arr['estimated_total_fare'] = array('text'=>"Estimated Total Fare", 'value'=>"Rs.".($this->totalAmount())+$this->gstAmount()+$this->driver_charges_per_day);
        $arr['Discount'] = array('text'=>"Discount (@".$this->discount."%)", 'value'=>"Rs.".$this->discountAmount());
        $arr['tejas_price'] = array('text'=>"Tejas Travel's Price", 'value'=>"Rs. ".$this->finalAmount());
        $arr['advance'] = array('text'=>"Advance Payable (@".$this->advance_during_booking."%)", 'value'=>"Rs. ".$this->advanceAmount());
        $arr['extra_hours'] = array('text'=>"Extra Hours", 'value'=>"Rs.".$this->additional_price_per_hr." per hours");
        $arr['included_hrs'] = array('text'=>"Included Hrs", 'value'=>$this->included_hr." kms");
        $arr['extra_kms'] = array('text'=>"Extra Kms", 'value'=>"Rs. ".$this->additional_price_per_km." per km");
        $arr['included_km'] = array('text'=>"Included Kms", 'value'=>$this->included_km." kms.");
        $arr['driver_batta'] = array('text'=>"Driver Batta", 'value'=>"Rs.".$this->driver_charges_per_day." after 10 hours/10 PM to 6 PM.");
        return $arr;
    }

    public function getAdminFinalPrice(){
        return $this->finalAmount();
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
