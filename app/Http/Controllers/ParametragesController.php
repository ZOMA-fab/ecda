<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametragesController extends Controller
{
           //Fonction pour afficher la page des paramétrages
           public function ajoutParametrages()
           {
               return view('pages.front-office.saisie-parametrages');
           }
             
}
