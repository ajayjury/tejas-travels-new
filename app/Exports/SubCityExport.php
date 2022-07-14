<?php

namespace App\Exports;

use App\Models\SubCity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubCityExport implements FromCollection,WithHeadings,WithMapping
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
    public function map($subcity): array
    {
         return[
             $subcity->id,
             $subcity->name,
             $subcity->description,
             $subcity->latitude,
             $subcity->longitude,
             $subcity->status==1 ? 'Active' : 'Inactive',
             $subcity->country->name,
             $subcity->state->name,
             $subcity->city->name,
             $subcity->created_at,
             $subcity->updated_at,
         ];
    }
    public function collection()
    {
        return SubCity::all();
    }
}
