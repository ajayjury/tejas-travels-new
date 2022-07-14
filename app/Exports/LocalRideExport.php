<?php

namespace App\Exports;

use App\Models\LocalRide;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Support\For\BookingType;

class LocalRideExport implements FromCollection,WithHeadings,WithMapping
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
            'Package Type',
            'Base Price',
            'Additional Price Per KM',
            'Additional Price Per Hr',
            'Additional Price Festival',
            'Additional Price Weekend',
            'Advance During Booking',
            'Advance Travel Start',
            'Advance Travel Complete',
            'GST',
            'Discount',
            'Included KM',
            'Included Day',
            'Included Hr',
            'Driver Charges Per Day',
            'Driver Charges Per Night',
            'From Date',
            'To Date',
            'State',
            'Cities',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($localride): array
    {
         return[
             $localride->id,
             BookingType::lists()[$localride->booking_type],
             $localride->vehicletype->name,
             $localride->vehicle->name,
             $localride->packagetype->name,
             $localride->base_price,
             $localride->additional_price_per_km,
             $localride->additional_price_per_hr,
             $localride->additional_price_festival,
             $localride->additional_price_weekend,
             $localride->advance_during_booking,
             $localride->advance_during_travel_start,
             $localride->advance_during_travel_complete,
             $localride->gst,
             $localride->discount,
             $localride->included_km,
             $localride->included_day,
             $localride->included_hr,
             $localride->driver_charges_per_day,
             $localride->driver_charges_per_night,
             $localride->from_date,
             $localride->to_date,
             $localride->state->name,
             $localride->GetCitiesName(),
             $localride->status==1 ? 'Active' : 'Inactive',
             $localride->created_at,
             $localride->updated_at,
         ];
    }
    public function collection()
    {
        return LocalRide::with(['State','Cities','Vehicle','VehicleType','PackageType'])->get();
    }
}
