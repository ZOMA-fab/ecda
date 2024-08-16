<?php

namespace App\Exports;

use App\Models\Produit;
use App\Models\Tab_TMA;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DossierExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tab_TMA::select('date_saisie', 'code_tma', 'nom_tma', 'type_tma', 'type_dossier_tma')->get();
    }
    public function headings(): array
    {
        return [
        'date_saisie',
        'code_tma',
        'nom_tma',
        'type_tma',
        'type_dossier_tma',
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

