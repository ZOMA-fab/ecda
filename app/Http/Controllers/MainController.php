<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Suggestion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DonneesMorpho;
use App\Models\Tab_TMA;
use Facade\Ignition\Tabs\Tab;
use App\Exports\SuggestionsExport;
use App\Exports\UtilisateursExport;
use App\Exports\DonneesMorphoExport;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Facades\Excel;

use Intervention\Image\Facades\Image;
use App\Models\DonneesMorphoSupprimee;
use App\Http\Requests\SuggestionFormRequest;
use App\Http\Requests\UtilisateurFormRequest;
use App\Http\Requests\DonneesMorphoFormRequest;
use App\Models\Tab_Dossier;

class MainController extends Controller
{
       //Fonction pour afficher la page d'acceuil
       public function afficherAcceuil()
       {
        $countTMA = Tab_TMA::count(); 
        $countDocumentTMA = Tab_Dossier::count(); 
        
        return view('pages.front-office.welcome', ['countTMA' => $countTMA], 
        ['countDocumentTMA' => $countDocumentTMA]);
       }      
            
        
}
