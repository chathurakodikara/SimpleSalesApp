<?php

namespace App\Exports;


use App\Models\PurchaseOrder;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PurchaseOrderExport implements FromArray, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $po;

    public function __construct($po)
    {
        $this->po = $po;
        // dd($this->po);
    }

    public function headings():array
    {
        return[
            'REGION',
            'TERRITORY',
            'DISTRIBUTOR',
            'PO NUMBER',
            'DATE',
            'TIME',
            'TOTAL PRICE',

        ];
    }

    public function map($po): array
    {
        return [
            $po['territory']['region']['name'],
            $po['territory']['name'],
            $po['user']['name'],
            $po['no'],
            $po['order_date'],
            $po['order_time'],
            $po['subtotal'],
        ];
    }

    public function array(): array
    {
        return $this->po;
        
    }

}
