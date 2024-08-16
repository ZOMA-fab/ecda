<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab_TypeDossier extends Model
{
    use HasFactory;
    protected $fillable= [
        'uuid',
        'date_saisie',
        'type_dossier_tma',
        'email_user',
       
    ];
}
