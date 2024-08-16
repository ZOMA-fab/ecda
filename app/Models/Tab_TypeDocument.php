<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab_TypeDocument extends Model
{
    use HasFactory;
    protected $fillable= [
        'uuid',
        'date_saisie',
        'type_document_tma',
        'email_user',
       
    ];
}
