<?php

namespace App\Exports;

use App\Models\Quotation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QuotationExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Email',
            'Phone',
            'Trip Type',
            'Sub Trip Type',
            'Vehicle Type',
            'Vehicle',
            'From Date',
            'To Date',
            'From Time',
            'To Time',
            'From City',
            'To City',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($quotation): array
    {
         return[
             $quotation->id,
             $quotation->name,
             $quotation->email,
             $quotation->phone,
             $quotation->triptype,
             $quotation->subtriptype,
             $quotation->vehicletype,
             $quotation->vehicle->name,
             $quotation->from_date,
             $quotation->to_date,
             $quotation->from_time,
             $quotation->to_time,
             $quotation->from_city,
             $quotation->to_city,
             $quotation->created_at,
             $quotation->updated_at,
         ];
    }
    public function collection()
    {
        return Quotation::all();
    }
}
