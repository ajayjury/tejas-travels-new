<?php

namespace App\Exports;

use App\Models\FAQ;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FAQExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Question',
            'Answer',
            'Position',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($faq): array
    {
         return[
             $faq->id,
             $faq->question,
             $faq->answer_formatted,
             $faq->position,
             $faq->status==1 ? 'Active' : 'Inactive',
             $faq->created_at,
             $faq->updated_at,
         ];
    }
    public function collection()
    {
        return FAQ::all();
    }
}
