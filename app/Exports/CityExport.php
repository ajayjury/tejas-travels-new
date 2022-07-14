<?php

namespace App\Exports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CityExport implements FromCollection,WithHeadings,WithMapping
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
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($city): array
    {
         return[
             $city->id,
             $city->name,
             $city->description,
             $city->latitude,
             $city->longitude,
             $city->status==1 ? 'Active' : 'Inactive',
             $city->country->name,
             $city->state->name,
             $city->created_at,
             $city->updated_at,
         ];
    }
    public function collection()
    {
        return City::all();
    }
}
