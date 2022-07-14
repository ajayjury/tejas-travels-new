<?php

namespace App\Exports;

use App\Models\Airport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AirportExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Description',
            'Latitude',
            'Longitude',
            'Status',
            'Country',
            'State',
            'City',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($airport): array
    {
         return[
             $airport->id,
             $airport->name,
             $airport->description,
             $airport->latitude,
             $airport->longitude,
             $airport->status==1 ? 'Active' : 'Inactive',
             $airport->country->name,
             $airport->state->name,
             $airport->city->name,
             $airport->created_at,
             $airport->updated_at,
         ];
    }
    public function collection()
    {
        return Airport::all();
    }
}
