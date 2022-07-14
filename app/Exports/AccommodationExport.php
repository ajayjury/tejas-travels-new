<?php

namespace App\Exports;

use App\Models\Accommodation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AccommodationExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($accommodation): array
    {
         return[
             $accommodation->id,
             $accommodation->name,
             $accommodation->status==1 ? 'Active' : 'Inactive',
             $accommodation->created_at,
             $accommodation->updated_at,
         ];
    }
    public function collection()
    {
        return Accommodation::all();
    }
}
