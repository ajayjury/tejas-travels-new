<?php

namespace App\Exports;

use App\Models\HolidayPackage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Support\For\PriceType;

class HolidayPackageExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Price Type',
            'Price',
            'Name',
            'Days',
            'Nights',
            'About',
            'Start Date',
            'End Date',
            'Amenities',
            'Browser Title',
            'URL',
            'Meta Keywords',
            'Meta Description',
            'Meta Header',
            'Meta Footer',
            'Country',
            'State',
            'City',
            'Status',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($holidaypackage): array
    {
         return[
             $holidaypackage->id,
             PriceType::lists()[$holidaypackage->price_type],
             $holidaypackage->price,
             $holidaypackage->name,
             $holidaypackage->day,
             $holidaypackage->night,
             $holidaypackage->about_formatted,
             $holidaypackage->start_date,
             $holidaypackage->end_date,
             $holidaypackage->GetAmenitiesName(),
             $holidaypackage->browser_title,
             $holidaypackage->url,
             $holidaypackage->meta_keywords,
             $holidaypackage->meta_description,
             $holidaypackage->seo_meta_header,
             $holidaypackage->seo_meta_footer,
             $holidaypackage->country->name,
             $holidaypackage->state->name,
             $holidaypackage->city->name,
             $holidaypackage->status==1 ? 'Active' : 'Inactive',
             $holidaypackage->created_at,
             $holidaypackage->updated_at,
         ];
    }
    public function collection()
    {
        return HolidayPackage::with(['State','City','Country','Amenities'])->get();
    }
}
