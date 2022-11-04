<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PackageType;

class AirportRide extends Model
{
    use HasFactory;
    protected $table="airportrides";

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

    public function SpecialFareAirportRide()
    {
        return $this->hasMany('App\Models\SpecialFareAirportRide', 'airportride_id');
    }

    public function SubCities()
    {
        return $this->belongsToMany(SubCity::class, 'airportridesubcities', 'airportride_id', 'subcity_id');
    }

    public function GetSubCitiesId(){
        return $this->SubCities()->pluck('subcities.id')->toArray();
    }

    public function GetSubCitiesName(){
        return $this->SubCities()->pluck('subcities.name');
    }

    public function Airport()
    {
        return $this->belongsTo('App\Models\Airport', 'airport_id');
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
    //     $arr['included_km'] = "Included Kms: <span style='font-weight:900;color:#000;'>".$this->included_km."</span> kms.";
    //     $arr['extra_kms'] = "Extra Kms: Rs. <span style='font-weight:900;color:#000;'>".$this->additional_price_per_km."</span> per km.";
    //     $arr['message'] = "New hour billing starts when usage more than 30 mins.";
    //     $arr['final_amount'] = $this->finalAmount();
    //     return $arr;
    // }

    public function getAmountArray(){
        $arr = [];
        $arr['base_price'] = "Base Price :  <span style='font-weight:900;color:#000;'>Rs.".$this->base_price."</span>";
        $arr['GST'] = "GST (@".$this->gst."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->gstAmount()."</span>";
        $arr['estimated_total_fare'] = "Estimated Total Fare : <span style='font-weight:900;color:#000;'>Rs.".($this->totalAmount())+$this->gstAmount()."</span>";
        $arr['Discount'] = "Discount (@".$this->discount."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->discountAmount()."</span>";
        $arr['tejas_price'] = "Tejas Travel's Price : <span style='font-weight:900;color:#000;'>Rs. ".$this->finalAmount()."</span>";
        $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : <span style='font-weight:900;color:#000;'>Rs. ".$this->advanceAmount()."</span>";
        $arr['included_km'] = "Included Kms: <span style='font-weight:900;color:#000;'>".$this->included_km."kms.</span> ";
        $arr['extra_kms'] = "Extra Kms:  <span style='font-weight:900;color:#000;'>Rs.".$this->additional_price_per_km."per km.</span> ";
        $arr['message'] = "New hour billing starts when usage more than 30 mins.";
        $arr['final_amount'] = $this->finalAmount();
        return $arr;
    }
    
    public function getAdminAmountArray(){
        $arr = [];
        $arr['base_price'] = "Base Price :  <span style='font-weight:900;color:#000;'>Rs.".$this->base_price."</span>";
        $arr['GST'] = "GST (@".$this->gst."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->gstAmount()."</span>";
        $arr['estimated_total_fare'] = "Estimated Total Fare : <span style='font-weight:900;color:#000;'>Rs.".($this->totalAmount())+$this->gstAmount()."</span>";
        $arr['Discount'] = "Discount (@".$this->discount."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->discountAmount()."</span>";
        $arr['tejas_price'] = "Tejas Travel's Price : <span style='font-weight:900;color:#000;'>Rs. ".$this->finalAmount()."</span>";
        $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : <span style='font-weight:900;color:#000;'>Rs. ".$this->advanceAmount()."</span>";
        $arr['included_km'] = "Included Kms: <span style='font-weight:900;color:#000;'>".$this->included_km."kms.</span> ";
        $arr['extra_kms'] = "Extra Kms:  <span style='font-weight:900;color:#000;'>Rs.".$this->additional_price_per_km."per km.</span> ";
        return $arr;
    }
    
    public function getAmountArrayEmail(){
        $arr = [];
        $arr['base_price'] = "Base Price :  <span style='font-weight:900;color:#000;'>Rs.".$this->base_price."</span>";
        $arr['GST'] = "GST (@".$this->gst."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->gstAmount()."</span>";
        $arr['estimated_total_fare'] = "Estimated Total Fare : <span style='font-weight:900;color:#000;'>Rs.".($this->totalAmount())+$this->gstAmount()."</span>";
        $arr['Discount'] = "Discount (@".$this->discount."%) : <span style='font-weight:900;color:#000;'>Rs.".$this->discountAmount()."</span>";
        $arr['tejas_price'] = "Tejas Travel's Price : <span style='font-weight:900;color:#000;'>Rs. ".$this->finalAmount()."</span>";
        $arr['advance'] = "Advance Payable (@".$this->advance_during_booking."%) : <span style='font-weight:900;color:#000;'>Rs. ".$this->advanceAmount()."</span>";
        $arr['included_km'] = "Included Kms: <span style='font-weight:900;color:#000;'>".$this->included_km."kms.</span> ";
        $arr['extra_kms'] = "Extra Kms:  <span style='font-weight:900;color:#000;'>Rs.".$this->additional_price_per_km."per km.</span> ";
        return $arr;
    }

    public function getAdminFinalPrice(){
        return $this->base_price;
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
