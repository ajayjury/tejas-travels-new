<?php

namespace App\Exports;

use App\Models\Amenity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Support\For\CommonFor;

class AmenityExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'For',
            'Image',
            'Description',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($amenity): array
    {
         return[
             $amenity->id,
             $amenity->name,
             CommonFor::lists()[$amenity->for],
             $amenity->image,
             $amenity->description,
             $amenity->status==1 ? 'Active' : 'Inactive',
             $amenity->created_at,
             $amenity->updated_at,
         ];
    }
    public function collection()
    {
        return Amenity::all();
    }
}
