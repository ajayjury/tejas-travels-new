<?php

namespace App\Exports;

use App\Models\State;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StateExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Description',
            'Status',
            'Country',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($state): array
    {
         return[
             $state->id,
             $state->name,
             $state->description,
             $state->status==1 ? 'Active' : 'Inactive',
             $state->country->name,
             $state->created_at,
             $state->updated_at,
         ];
    }
    public function collection()
    {
        return State::with('Country')->get();
    }
}
