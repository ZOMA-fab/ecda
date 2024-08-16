<?php

namespace App\Exports;

use App\Models\Tab_Dossier;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DocumentDossierExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tab_Dossier::select('date_saisie', 'code_tma', 'type_tma', 'type_dossier_tma', 'type_document_tma',  'document_tma')->get();
    }
    public function headings(): array
    {
        return [

        'date_saisie',
        'code_tma',
        'type_tma',
        'type_dossier_tma',
        'type_document_tma',
        'document_tma',

        ];
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:I1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFA500');
              
                 $event->sheet->getDelegate()->freezePane('A2');  
            },

        ];
    }
}
