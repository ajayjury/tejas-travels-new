<?php

namespace App\Exports;

use App\Models\DynamicWebPage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DynamicWebPageExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Content',
            'Browser Title',
            'URL',
            'Meta Keywords',
            'Meta Description',
            'Meta Header',
            'Meta Footer',
            'Status',
            'Is System Page',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function map($dynamicwebpage): array
    {
         return[
             $dynamicwebpage->id,
             $dynamicwebpage->name,
             $dynamicwebpage->content_formatted,
             $dynamicwebpage->browser_title,
             $dynamicwebpage->url,
             $dynamicwebpage->meta_keywords,
             $dynamicwebpage->meta_description,
             $dynamicwebpage->seo_meta_header,
             $dynamicwebpage->seo_meta_footer,
             $dynamicwebpage->status==1 ? 'Active' : 'Inactive',
             $dynamicwebpage->system_page==1 ? 'Yes' : 'No',
             $dynamicwebpage->created_at,
             $dynamicwebpage->updated_at,
         ];
    }
    public function collection()
    {
        return DynamicWebPage::all();
    }
}
