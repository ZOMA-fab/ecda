<?php

namespace App\Http\Controllers;

use App\Models\Tab_TMA;
use App\Models\Tab_Dossier;
use App\Models\Tab_TypeTMA;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\DossierExport;
use App\Models\Tab_TypeDossier;
use App\Models\Tab_TypeDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\TMAFormRequest;
use App\Exports\DocumentDossierExport;
use Illuminate\Database\QueryException;
use App\Http\Requests\DossierFormRequest;

class DossierController extends Controller
{
     //Fonction pour afficher le formulaire de saisie des lettres
     public function ajoutDossier()
     {   
        
        return view('pages.front-office.saisie-dossier', [
            'lestypestmas' => Tab_TypeTMA::orderBy('type_tma', 'ASC')->get(),
            'lestypesdossiers' => Tab_TypeDossier::orderBy('type_dossier_tma', 'ASC')->get(),
            'lestypesdocuments' => Tab_TypeDocument::orderBy('type_document_tma', 'ASC')->get()
         ]);
        
     }
     //Fonction pour créer un nouveau dossier
     public function enregistreDossier(TMAFormRequest $request)
     {
         DB::beginTransaction();
     
         try {
             // Your database operation here
             $data = [
                 "uuid" => Str::uuid(),
                 'date_saisie' => $request->date_saisie,
                 'code_tma' => $request->code_tma,
                 'nom_tma' => $request->nom_tma,
                 'type_tma' => $request->type_tma,
                 'sigle_tma' => $request->sigle_tma,
                 'type_dossier_tma' => $request->type_dossier_tma,
                 'email_user' => $request->email_user,
             ];
             Tab_TMA::create($data);
     
             foreach ($request->type_document_tma as $index => $type_document_tma) {
                 if ($request->hasFile('document_tma.' . $index)) {
                     $document_tma = $request->code_tma . "_" . $request->type_dossier_tma . "_" . $request->file('document_tma.' . $index)->getClientOriginalName();
                     $request->file('document_tma.' . $index)->storeAs("public/tma-documents", $document_tma);
     
                     Tab_Dossier::create([
                         'uuid' => Str::uuid(),
                         'date_saisie' => $request->date_saisie,
                         'code_tma' => $request->code_tma,
                         'type_tma' => $request->type_tma,
                         'type_dossier_tma' => $request->type_dossier_tma,
                         'type_document_tma' => $type_document_tma,
                         'document_tma' => $document_tma,
                         'email_user' => $request->email_user,
                     ]);
                 }
             }
     
             DB::commit();
     
             return redirect()->route('dossier.ajout')->with('statut', 'Nouveau Dossier' .' ' .$request->code_tma. ' '. ' ajouté avec succès');
         } catch (QueryException $e) {
             DB::rollBack();
     
             $errorCode = $e->errorInfo[1]; // get the SQLSTATE error code
             $errorMessage = $e->getMessage(); // get the error message
     
             // Log the error
             Log::error("SQLSTATE Error (Code: $errorCode): $errorMessage");
     
             // Check if the error is due to a duplicate entry
             if ($errorCode == 1062) {
                 $errorField = "le code_tma :$request->code_tma et le type_dossier_tma : $request->type_dossier_tma"; // Adjust this according to your specific field combination
                 $errorMessage = "$errorField existent déjà"; // Customize this message as needed
     
                 // Flash the error message to the session
                 $request->session()->flash('error', "SQLSTATE Error (Code: $errorCode): $errorMessage");
     
                 // Redirect back to the previous page or somewhere else as needed
                 return redirect()->back();
             } 
         }
     }
    
   
    //Fonction pour afficher la liste des archives
    public function listeDossier()
{
    return view('pages.front-office.liste-dossier',[
        'lesdossiers' => Tab_TMA::orderBy('date_saisie', 'DESC')->get(),
        'lestypestmas' => Tab_TypeTMA::orderBy('type_tma', 'ASC')->get(),
        'lestypesdossiers' => Tab_TypeDossier::orderBy('type_dossier_tma', 'ASC')->get(),
    ]);
}
     //Fonction pour exporter les TAM archivés sur excel
     public function excelExportTMA()
     {
        return Excel::download(new DossierExport, "TAM_Archivés.xls");
     }  
     
     //Fonction pour exporter les documents des TMA archivés sur excel
     public function excelExportdocumentTMA()
     {
        return Excel::download(new DocumentDossierExport, "Dcuments_TAM_Archivés.xls");
     }  
     
      //Fonction pour rechercher les archives 
      public function rechercheDossier(Request $request)
      {
      $_recherche = $_GET['recherche'];
      if ($_recherche !=''){
       $lesresultats = Tab_TMA::query()
                    ->where('date_saisie', 'LIKE',  "%{$_recherche}%") 
                    ->orwhere ('code_tma',  'LIKE',  "%{$_recherche}%")
                    ->orwhere ('nom_tma',  'LIKE',  "%{$_recherche}%")
                    ->orwhere ('type_tma',  'LIKE',  "%{$_recherche}%")
                    ->orwhere ('type_dossier_tma',  'LIKE',  "%{$_recherche}%")
                       -> get();         
      
      return view('pages.front-office.recherche-dossier',[
        'lestypestmas' => Tab_TypeTMA::orderBy('type_tma', 'ASC')->get(),
        'lestypesdossiers' => Tab_TypeDossier::orderBy('type_dossier_tma', 'ASC')->get(),
      ] , compact('lesresultats'));
      }
      else
      {
      return back()->with('erreur','Entrer un élément pour la recherche');
      }
     }

     //Fonction pour modifier une archive après l'avoir affichée
     public function modifierDossier(Request $request, $id)
{
    $type_tma = $request->input('type_tma');
    $type_dossier_tma = $request->input('type_dossier_tma');
    
    if (!empty($type_tma) && !empty($type_dossier_tma)) {
        try {
            Tab_TMA::where('id', $id)->update([
                "date_saisie" => $request->date_saisie,
                "code_tma" => $request->code_tma,
                "nom_tma" => $request->nom_tma,
                "type_tma" => $request->type_tma,
                "type_dossier_tma" => $request->type_dossier_tma,
            ]);

            return redirect()->back()->with('statut', 'Dossier ' . $request->code_tma . ' modifié avec succès');
        } catch (QueryException $e) {
            // Check for duplicate entry error (error code 1062)
            if ($e->getCode() == 23000) {
                $errorMessage = "Impossible ! Un TMA " . $request->code_tma . ", " . $request->type_tma . " et " . $request->type_dossier_tma . " existe déjà";
            } else {
                // General error message
                $errorMessage = "Une erreur est survenue lors de la mise à jour du dossier.";
            }

            // Flash the error message to the session
            $request->session()->flash('error', $errorMessage);

            // Redirect back to the previous page or somewhere else as needed
            return redirect()->back();
        }
    } else {
        $errorMessage = "Veuillez choisir un 'type_tma' et 'type_dossier_tma'.";
        
        // Flash the error message to the session
        $request->session()->flash('error', $errorMessage);
        
        // Redirect back to the previous page or somewhere else as needed
        return redirect()->back();
    }
}

        //Fonction pour supprimer une archive
        public function supprimerDossier(Request $request, $id)
        {
    
            $lesdossier = Tab_TMA::find($id);
            $lesdossier ->destroy($id);
           return redirect()->route('dossier.liste')->with('statut', 'Dossier'.' ' .$lesdossier->code_tma. ' '. 'supprimée avec succès');
        }
    //Fonction pour afficher la vue de details archives
    public function detailDossier(Request $request, $id)
    {
        $detaildossiers = Tab_TMA::find($id);
    
        if (!$detaildossiers) {
            // Handle the case when the record is not found
            abort(404);
        }
    
        $code_tma = $detaildossiers->code_tma;
        $type_dossier_tma = $detaildossiers->type_dossier_tma;
      
        return view('pages.front-office.detail-dossier', [
            'lesdocumentstmas' => Tab_Dossier::query()
                                              ->where('code_tma', $code_tma)
                                              ->where('type_dossier_tma', $type_dossier_tma)
                                              ->get(),
            'detaildossiers' => $detaildossiers
        ]);
    }
    
     //Fonction pour afficher le formulaire de saisie du TMA dont 
     //on veut ajouter le document
     public function documentRechercheajout()
     {   
        
        return view('pages.front-office.rechercheajout-document',[
            'lesrecherchestypesdossiers' => Tab_TypeDossier::orderBy('type_dossier_tma', 'ASC')->get(),
        ]);   
        
     }
       
         //Fonction pour afficher le formulaire d'ajout du document au TMA
         public function documentPreajout(Request $request)
         {
             $recherche_tma_a_ajouter = $request->input('recherche_tma_a_ajouter');
             $recherche_type_dossier_a_ajouter = $request->input('recherche_type_dossier_a_ajouter');
         
             if (!empty($recherche_tma_a_ajouter)) {
                 $lesresultatsrecherchetmaaajoutes = Tab_TMA::where('code_tma', $recherche_tma_a_ajouter)
                     ->where('type_dossier_tma', $recherche_type_dossier_a_ajouter)
                     ->first(); // Use first() to retrieve a single instance
         
                 if ($lesresultatsrecherchetmaaajoutes) {
                     return view('pages.front-office.ajout-document', [
                         'ajoutlestypesdocuments' => Tab_TypeDocument::orderBy('type_document_tma', 'ASC')->get(),
                         'lesresultatsrecherchetmaaajoutes' => $lesresultatsrecherchetmaaajoutes,
                     ]);
                 } else {
                     $errorMessage = "Aucun TMA trouvé";
         
                     // Flash the error message to the session
                     $request->session()->flash('error', $errorMessage);
         
                     // Redirect back to the previous page or somewhere else as needed
                     return redirect()->back();
                 }
             } else {
                 $errorMessage = "Veuillez remplir les deux champs";
         
                 // Flash the error message to the session
                 $request->session()->flash('error', $errorMessage);
         
                 // Redirect back to the previous page or somewhere else as needed
                 return redirect()->back();
             }
         }
         
        
    //Fonction pour ajouter un document à un TMA déjà archivé
    public function documentAjout(Request $request)
    {


        foreach ($request->type_document_tma as $index => $stype_document_tma) {
            if ($request->hasFile('document_tma.' . $index)) {
                $document_tma = $request->code_tma."_".$request->type_dossier_tma."_". $request->file('document_tma.' . $index)->getClientOriginalName();
                $request->file('document_tma.' . $index)->storeAs("public/tma-documents", $document_tma);
        
                Tab_Dossier::create([
                    'uuid' => Str::uuid(),
                    'date_saisie' => $request->date_saisie,
                    'code_tma' => $request->code_tma,
                    'type_tma' => $request->type_tma,
                    'type_dossier_tma' => $request->type_dossier_tma,
                    'type_document_tma' => $stype_document_tma,
                    'document_tma' => $document_tma,
                    'email_user'=> $request->email_user,
                ]);
            }
        }   
               
        return redirect()->back()->with('statut', 'Nouveau document ajouté au TMA'. ' '. $request->code_tma.' '. 'avec succès');
      
    }    
         
         
         

}
