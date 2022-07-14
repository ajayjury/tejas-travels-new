<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Support\For\UserType;

class SubAdminExport implements FromCollection,WithHeadings,WithMapping
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
            'User Type',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($user): array
    {
         return[
             $user->id,
             $user->name,
             $user->email,
             $user->phone,
             UserType::lists()[$user->userType],
             $user->status==1 ? 'Active' : 'Inactive',
             $user->created_at,
             $user->updated_at,
         ];
    }
    public function collection()
    {
        return User::all();
    }
}
