<?php

namespace App\Exports;

use App\Models\OutStation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Support\For\BookingType;

class OutStationExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Booking Type',
            'Vehicle Type',
            'Vehicle',
            'One Way Price Per KM',
            'Round Price Per KM',
            'Additional Price Festival',
            'Additional Price Weekend',
            'Advance During Booking',
            'Advance Travel Start',
            'Advance Travel Complete',
            'GST',
            'Discount',
            'Min KM Per Day1',
            'Min KM Per Day2',
            'Driver Charges Per Day',
            'Driver Charges Per Night',
            'From Date',
            'To Date',
            'State',
            'City',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($outstation): array
    {
         return[
             $outstation->id,
             BookingType::lists()[$outstation->booking_type],
             $outstation->vehicletype->name,
             $outstation->vehicle->name,
             $outstation->one_way_price_per_km,
             $outstation->round_price_per_km,
             $outstation->additional_price_festival,
             $outstation->additional_price_weekend,
             $outstation->advance_during_booking,
             $outstation->advance_during_travel_start,
             $outstation->advance_during_travel_complete,
             $outstation->gst,
             $outstation->discount,
             $outstation->min_km_per_day1,
             $outstation->min_km_per_day2,
             $outstation->driver_charges_per_day,
             $outstation->driver_charges_per_night,
             $outstation->from_date,
             $outstation->to_date,
             $outstation->state->name,
             $outstation->city->name,
             $outstation->status==1 ? 'Active' : 'Inactive',
             $outstation->created_at,
             $outstation->updated_at,
         ];
    }
    public function collection()
    {
        return OutStation::with(['State','City','Vehicle','VehicleType'])->get();
    }
}
