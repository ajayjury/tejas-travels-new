<?php

namespace App\Exports;

use App\Models\Country;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CountryExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Dial',
            'Image',
            'Description',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($country): array
    {
         return[
             $country->id,
             $country->name,
             $country->dial,
             $country->image,
             $country->description,
             $country->status==1 ? 'Active' : 'Inactive',
             $country->created_at,
             $country->updated_at,
         ];
    }
    public function collection()
    {
        return Country::all();
    }
}
