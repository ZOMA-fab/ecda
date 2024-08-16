<?php

namespace App\Http\Controllers;

use App\Exports\StatistiquesExport;
use App\Exports\StatistiquespardatesaisieExport;
use App\Models\Tab_TMA;
use App\Models\Tab_Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StatistiqueController extends Controller
{
     // Fonction pour afficher la page des statitistiques de tous les TMA
     public function touslestmaStatistique()
     {
        $nombretouslestma = Tab_TMA::select('type_tma', DB::raw('count(*) as total'))
        ->groupBy('type_tma')
        ->get();
    
        $sumTotal = Tab_TMA::count('type_tma');

        return view('pages.front-office.statistique-touslestma', compact('nombretouslestma', 'sumTotal'));
     }
           // Fonction pour afficher la page d'accueil
     public function touslestmaexportStatistique()
     {
        $nombretouslestma = Tab_TMA::select('type_tma', DB::raw('count(*) as total'))
        ->groupBy('type_tma')
        ->get();
    
        return Excel::download(new StatistiquesExport($nombretouslestma), 'statistiques_touslestma.xlsx');
    }
     // Fonction pour afficher la page de recherche des statitistiques par date de saisie
     public function tmapardatesaisieStatistique()
     {
        
        return view('pages.front-office.statistique-recherchetmapardatesaisie');
     }
       // Fonction pour afficher la page de recherche des statitistiques par date de saisie
       public function resultattmapardatesaisieStatistique(Request $request)
       {
           $date_debut = $request->input('date_debut');
           $date_fin = $request->input('date_fin');

           if ($date_debut > $date_fin) {
               return redirect()->route('tmapardatesaisie.statistique')->with('error', 'Veuillez choisir une date de fin supérieure à la date de début');
           }
       
           if (empty($date_debut) || empty($date_fin)) {
               return redirect()->route('tmapardatesaisie.statistique')->with('error1', 'Veuillez choisir une date de début et une date de fin');
           }
       
           $records = Tab_TMA::whereBetween('date_saisie', [$date_debut, $date_fin])
               ->select('type_tma', DB::raw('count(*) as total'))
               ->groupBy('type_tma')
               ->get();
       
           return view('pages.front-office.statistique-tmapardatesaisie', compact('records', 'date_debut', 'date_fin'));
       }
       
       // Fonction pour exporter statitistiques par date de saisie
       public function tmapardatesaisieexportStatistique(Request $request)
      {
          $date_debut = $request->input('date_debut');
          $date_fin = $request->input('date_fin');
         

           return Excel::download(new StatistiquespardatesaisieExport($date_debut, $date_fin), 'Statistiquespardatesaisie.xlsx');
      }
       
       
     
}
