<?php

namespace App\Exports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProductsExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_CURRENCY_IDR,
            'H' => NumberFormat::FORMAT_CURRENCY_IDR,
            'I' => NumberFormat::FORMAT_CURRENCY_IDR,
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Products::all();
    }

    public function headings(): array
    {
        return [
            ' No',
            ' Suppliers',
            ' Barang',
            ' Sisa Barang',
            ' Barang Keluar',
            ' Barang Rusak',
            ' Harga Beli',
            ' Harga Jual',
            ' Biaya Transport',
            ' jenis',
            ' Created at',
            ' Updated at'
        ];
    }

    public function registerEvents(): array
        {
        return [
            AfterSheet::class    => function(AfterSheet $event) 
            {

                       $cellRange = 'A1:L1'; // All headers
                       $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Berlin Sans FB');
               $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);

        
            },
              ];

              
       }

       

}
