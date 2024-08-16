<?php

namespace App\Http\Controllers;

use App\Models\Tab_TypeTMA;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TypeTMAFormRequest;
use App\Models\Tab_TMA;

class TypeTMAController extends Controller
{
           //Fonction pour afficher la page de saisie des nouveaux type de TMA
           public function ajoutTypeTMA()
           {
            return view('pages.front-office.saisie-typetma');
           }

                //Fonction pour créer un nouveau type de TMA
    public function enregistreTypeTMA(TypeTMAFormRequest $request)
    {
        Tab_TypeTMA::create([
            "uuid" => Str::uuid(),
            'date_saisie' => $request->date_saisie,
            'type_tma'=> $request->type_tma,
            'email_user'=> $request->email_user,
                      
        ]);
          
        return redirect()->route('parametrages.ajout')->with('statut', 'Nouveau Type TMA ajouté avec succès');
      
    }
    
             
}
