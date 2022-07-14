<?php

namespace App\Exports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VehicleExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Seating',
            'Vehicle Type',
            'Description',
            'Browser Title',
            'URL',
            'Meta Keywords',
            'Meta Description',
            'Meta Header',
            'Meta Footer',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($state): array
    {
         return[
             $state->id,
             $state->name,
             $state->seating,
             $state->vehicletype->name,
             $state->description,
             $state->browser_title,
             $state->url,
             $state->meta_keywords,
             $state->meta_description,
             $state->seo_meta_header,
             $state->seo_meta_footer,
             $state->status==1 ? 'Active' : 'Inactive',
             $state->created_at,
             $state->updated_at,
         ];
    }
    public function collection()
    {
        return Vehicle::with('VehicleType')->get();
    }
}
