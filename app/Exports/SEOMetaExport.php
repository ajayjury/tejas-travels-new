<?php

namespace App\Exports;

use App\Models\SEOMeta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SEOMetaExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Page Name',
            'Header',
            'Footer',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($seometa): array
    {
         return[
             $seometa->id,
             $seometa->name,
             $seometa->header,
             $seometa->footer,
             $seometa->created_at,
             $seometa->updated_at,
         ];
    }
    public function collection()
    {
        return SEOMeta::all();
    }
}
