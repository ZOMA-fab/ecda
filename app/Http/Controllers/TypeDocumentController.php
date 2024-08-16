<?php

namespace App\Http\Controllers;

use App\Models\Tab_TypeDocument;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TypeDocumentFormRequest;

class TypeDocumentController extends Controller
{
       //Fonction pour afficher la page de saisie des nouveaux type de document TMA
        public function ajoutTypeDocument()
        {
             return view('pages.front-office.saisie-typedocument');
        }
    
        //Fonction pour créer un nouveau type de document TMA
        public function enregistreTypeDocument(TypeDocumentFormRequest $request)
        {
            Tab_TypeDocument::create([
                "uuid" => Str::uuid(),
                'date_saisie' => $request->date_saisie,
                'type_document_tma'=> $request->type_document_tma,
                'email_user'=> $request->email_user,
                          
            ]);
              
            return redirect()->route('parametrages.ajout')->with('statut', 'Nouveau Type Document TMA ajouté avec succès');
          
        }
}
