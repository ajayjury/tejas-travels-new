<?php

namespace App\Exports;

use App\Models\Testimonial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TestimonialExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Star',
            'Designation',
            'Image',
            'Message',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($testimonial): array
    {
         return[
             $testimonial->id,
             $testimonial->name,
             $testimonial->star,
             $testimonial->designation,
             $testimonial->image,
             $testimonial->message,
             $testimonial->status==1 ? 'Active' : 'Inactive',
             $testimonial->created_at,
             $testimonial->updated_at,
         ];
    }
    public function collection()
    {
        return Testimonial::all();
    }
}
