<?php

namespace App\Exports;

use App\Models\DonneesMorpho;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DonneesMorphoExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DonneesMorpho::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'uuid', 
            'date_saisie', 
            'nom_scientifique',
            'nom_locale', 
            'region',
            'partie',  
            'couleur_feuille',
            'stade_feuille',  
            'image_saine',
            'image_malade',
            'sypmtome_maladie',
            'autre_sypmtome_maladie',
            'type_maladie',
            'autre_type_maladie',
            'name_user',
            'prename_user',
            'email_user',
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

                $event->sheet->getDelegate()->getStyle('A1:U1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFA500');
              
                 $event->sheet->getDelegate()->freezePane('A2');  
            },

        ];
    }
}
