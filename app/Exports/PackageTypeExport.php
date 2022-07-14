<?php

namespace App\Exports;

use App\Models\PackageType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PackageTypeExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($country): array
    {
         return[
             $country->id,
             $country->name,
             $country->created_at,
             $country->updated_at,
         ];
    }
    public function collection()
    {
        return PackageType::all();
    }
}
