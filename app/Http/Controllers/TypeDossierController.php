<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tab_TypeDossier;
use App\Http\Requests\TypeDossierFormRequest;

class TypeDossierController extends Controller
{
    //Fonction pour afficher la page de saisie des nouveaux type de dossier TMA
    public function ajoutTypeDossier()
    {
         return view('pages.front-office.saisie-typedossier');
    }

    //Fonction pour créer un nouveau type de dossier TMA
    public function enregistreTypeDossier(TypeDossierFormRequest $request)
    {
        Tab_TypeDossier::create([
            "uuid" => Str::uuid(),
            'date_saisie' => $request->date_saisie,
            'type_dossier_tma'=> $request->type_dossier_tma,
            'email_user'=> $request->email_user,
                      
        ]);
          
        return redirect()->route('parametrages.ajout')->with('statut', 'Nouveau Type Dossier TMA ajouté avec succès');
      
    }
}
