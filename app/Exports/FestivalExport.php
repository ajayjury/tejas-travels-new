<?php

namespace App\Exports;

use App\Models\Festival;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Support\For\HolidayType;

class FestivalExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Start Date',
            'Country',
            'State',
            'City',
            'Holiday Type',
            'Description',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($festival): array
    {
         return[
             $festival->id,
             $festival->name,
             $festival->start_date,
             $festival->country->name,
             $festival->state->name,
             $festival->GetCitiesName(),
             HolidayType::lists()[$festival->holiday_type],
             $festival->description,
             $festival->status==1 ? 'Active' : 'Inactive',
             $festival->created_at,
             $festival->updated_at,
         ];
    }
    public function collection()
    {
        return Festival::all();
    }
}
