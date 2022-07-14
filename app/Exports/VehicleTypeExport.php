<?php

namespace App\Exports;

use App\Models\VehicleType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VehicleTypeExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Image',
            'Description',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($vehicletype): array
    {
         return[
             $vehicletype->id,
             $vehicletype->name,
             $vehicletype->image,
             $vehicletype->description,
             $vehicletype->status==1 ? 'Active' : 'Inactive',
             $vehicletype->created_at,
             $vehicletype->updated_at,
         ];
    }
    public function collection()
    {
        return VehicleType::all();
    }
}
