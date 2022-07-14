<?php

namespace App\Exports;

use App\Models\Complaint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ComplaintExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Phone',
            'Email',
            'Title',
            'Message',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($complaint): array
    {
         return[
             $complaint->id,
             $complaint->name,
             $complaint->phone,
             $complaint->email,
             $complaint->title,
             $complaint->message,
             $complaint->created_at,
             $complaint->updated_at,
         ];
    }
    public function collection()
    {
        return Complaint::all();
    }
}
