<?php

namespace App\Exports;

use App\Models\Coupon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Support\For\RideType;
use App\Support\For\CustomerType;
use App\Support\For\UseType;
use App\Support\For\DiscountType;

class CouponExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Code',
            'Start Date',
            'End Date',
            'Ride Type',
            'Vehicle Type',
            'Customer Type',
            'Use Type',
            'No. Of Use',
            'Min Invoice Amount',
            'Discount Type',
            'Discount',
            'Max Discount',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($coupon): array
    {
         return[
             $coupon->id,
             $coupon->name,
             $coupon->code,
             $coupon->start_date,
             $coupon->end_date,
             RideType::lists()[$coupon->ride_type],
             $coupon->GetVehicleTypesName(),
             CustomerType::lists()[$coupon->customer_type],
             UseType::lists()[$coupon->use_type],
             $coupon->no_of_use,
             $coupon->min_invoice_amount,
             DiscountType::lists()[$coupon->discount_type],
             $coupon->discount,
             $coupon->max_discount,
             $coupon->status==1 ? 'Active' : 'Inactive',
             $coupon->created_at,
             $coupon->updated_at,
         ];
    }
    public function collection()
    {
        return Coupon::with('VehicleTypes')->get();
    }
}
