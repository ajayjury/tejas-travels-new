<?php

namespace App\Exports;

use App\Models\Transporter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransporterExport implements FromCollection,WithHeadings,WithMapping
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
            'State',
            'City',
            'Vehicle',
            'Description',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($transporter): array
    {
         return[
             $transporter->id,
             $transporter->name,
             $transporter->email,
             $transporter->phone,
             $transporter->state->name,
             $transporter->GetCitiesName(),
             $transporter->GetVehiclesName(),
             $transporter->description,
             $transporter->status==1 ? 'Active' : 'Inactive',
             $transporter->created_at,
             $transporter->updated_at,
         ];
    }
    public function collection()
    {
        return Transporter::all();
    }
}
