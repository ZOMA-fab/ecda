<?php

namespace App\Exports;

use App\Models\Tab_TMA;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StatistiquesExport implements FromCollection, WithHeadings, WithEvents
{

    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'Type TMA',
            'Nombre',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:B1'; // All headers
                $event->sheet->getDelegate()
                ->getStyle($cellRange)
                ->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFA500');
            },
        ];
    }
}
