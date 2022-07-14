<?php

namespace App\Exports;

use App\Models\AirportRide;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Support\For\BookingType;

class AirportRideExport implements FromCollection,WithHeadings,WithMapping
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
            'Airport',
            'Base Price',
            'Additional Price Per KM',
            'Additional Price Festival',
            'Additional Price Weekend',
            'Advance During Booking',
            'Advance Travel Start',
            'Advance Travel Complete',
            'GST',
            'Discount',
            'Included KM',
            'From Date',
            'To Date',
            'State',
            'City',
            'SubCity',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($airportride): array
    {
         return[
             $airportride->id,
             BookingType::lists()[$airportride->booking_type],
             $airportride->vehicletype->name,
             $airportride->vehicle->name,
             $airportride->airport->name,
             $airportride->base_price,
             $airportride->additional_price_per_km,
             $airportride->additional_price_festival,
             $airportride->additional_price_weekend,
             $airportride->advance_during_booking,
             $airportride->advance_during_travel_start,
             $airportride->advance_during_travel_complete,
             $airportride->gst,
             $airportride->discount,
             $airportride->included_km,
             $airportride->from_date,
             $airportride->to_date,
             $airportride->state->name,
             $airportride->city->name,
             $airportride->GetSubCitiesName(),
             $airportride->status==1 ? 'Active' : 'Inactive',
             $airportride->created_at,
             $airportride->updated_at,
         ];
    }
    public function collection()
    {
        return AirportRide::with(['State','City','SubCities','Vehicle','VehicleType','Airport'])->get();
    }
}
