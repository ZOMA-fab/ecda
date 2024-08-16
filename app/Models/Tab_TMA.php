<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab_TMA extends Model
{
    use HasFactory;
    protected $fillable= [
        'uuid',
        'date_saisie',
        'code_tma',
        'nom_tma',
        'type_tma',
        'type_dossier_tma',
        'email_user',
       
    ];

    public function tab_dossier()
         {
                return $this->hasMany(Tab_Dossier::class);
       }
}
