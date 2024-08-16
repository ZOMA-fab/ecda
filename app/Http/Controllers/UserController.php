<?php

namespace App\Http\Controllers;



use Carbon\Carbon;
use App\Models\User;
use App\Models\Tab_TMA;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UtilisateursExport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UtilisateurFormRequest;

class UserController extends Controller
{
    //Fonction pour afficher le formulaire de saisie d'un utilisateur
    public function ajoutUtilisateur()
    {
    return view('pages.front-office.saisie-utilisateur');
   }
    //Fonction pour créer un nouvel utilisateur
   protected function enregistreUtilisateur(UtilisateurFormRequest $request)
   {
    User::create([
        "name" => $request->name,
        "prename" => $request->prename,
        "email" => $request->email,
        "profil" => $request->profil,
        'password' => Hash::make($request->password),
        "last_activity" => $request->last_activity,
    ]);
    return redirect()->route('utilisateur.ajout')->with('statut', 'Nouvel utilisateur'. ' '. $request->name. ' '. 'ajouté avec succès');
    }

    //Fonction pour modifier un utilisateur après l'avoir affichée
    public function modifierUtilisateur(Request $request, $id)
   {
    User::where('id', $id)->update([
        "name" => $request->name,
        "prename" => $request->prename,
        "email" => $request->email,
        "profil" => $request->profil,
        'password' => Hash::make($request->password),
        //"last_activity" => $request->last_activity,
      
    ]);
    return redirect()->back()->with('statut', 'Utilisateur'. ' '. $request->name. ' '. 'modifié avec succès');
   }

   //Fonction pour supprimer un utilisateur
    public function supprimerUtilisateur($id)
   {
  $utilisateur = User::find($id);
  $utilisateur ->destroy($id);
  return redirect()->route('utilisateur.liste')->with('statut', 'Utilisateur'.' ' .$utilisateur->name. ' '. 'supprimé avec succès');
   }

    //Fonction pour afficher les utilisateurs
    public function listeUtilisateur()
    {   
 
        return view('pages.front-office.liste-utilisateur',[
            'lesutilisateurs' => User:: orderBy('created_at', 'DESC')->get(),
         ]);
    
    }

    //Fonction pour exporter les utilisateurs sur excel
    public function excelUtilisateursExport()
    {
        return Excel::download(new UtilisateursExport, "Utilisateurs.xls");
    }

    //Fonction pour afficher le formulaire de changement du mot de passe
    public function changerMotdepasseUtilisateur()
    {
        return view('pages.front-office.changer-motdepasseutilisateur');
    }

   //Fonction pour changer le mot de passe
    public function nouveaumotdepasseUtilisateur(Request $request )
  {
    $email= $request->input('email');
    $password= $request->input('password');
    $password_confirmation= $request->input('password_confirmation');        
  
    if($password != $password_confirmation){
        return redirect()->back()->with('statut', 'les mots de passe saisis sont differents');
    }
    else{
        
    User::where('email', $email)->update([
        'password' => Hash::make($request->password),]);
    //return redirect()->route('login')->with('statut', 'Mot de passe modifié avec succès');
    return redirect()->route('accueil')->with('statut1', 'Mot de passe modifié avec succès');
    }
    
  }
    
    //Fonction pour afficher le crud utilisateur
    public function crudUtilisateur()
    {   
 
        return view('pages.front-office.crud-utilisateur',[
            'lescrudderniereconnexionutilisateurs' => User::orderby('last_login', 'DESC')->get(),
            'lescrudsaisiedossierutilisateurs' => Tab_TMA::orderby('updated_at', 'DESC')->get()
         ]);
    
    }
 
    //Fonction pour affichier la saisie du mail pour reinitialiser le mot de passe
    public function saisiereinitialiserMotdepasseUtilisateur()
   {
        return view('pages.front-office.saisiereinitialise-motdepasse');
   }
    //Fonction pour envoyer le lien de reinitialisation du mot de passe
    public function lienreinitialiserMotdepasseUtilisateur(Request $request)
   {
    $validated = $request->validate([
        'email' => 'required|email|exists:users,email'
    ], [
        'email.exists' => "Cet email n'existe pas."
    ]);

       $token = Str::random(64);
       DB::table('password_resets')->insert([
             'email'=> $request->email,
             'token'=>$token,
             'created_at'=>Carbon::now(),
       ]);
       $action_link = route('motdepasseutilisateur.reinitialiser',['token'=>$token, 'email'=>$request->email]);
       $body = "We have received a request to reset the password for <b>ecda</b> account associated with.".$request->email.
       ". You can reset your password by clicking the link below.";

       Mail::send('pages.front-office.email-forgot', ['action_link'=>$action_link, 'body'=>$body], function($message) use ($request){
             $message->from('cadastreminierbf@gmail.com', 'ecda');
             $message->to($request->email)
                     ->subject('Reset Password');
       });

       return redirect()->back()->with('success', 'Vous avez reçu un mail avec un lien de réinitialisation');
   }

   
    //Fonction pour affichier le formulaire de reinitialisation le mot de passe
    public function reinitialiserMotdepasseUtilisateur(Request $request, $token = null)
   {
        return view('pages.front-office.reinitialise-motdepasse')->with(['token'=>$token, 'email'=>$request->email]);
   }
    //Fonction pour enregistrer le mot de passe reinitialisé
   public function enregistrerreinitialiserMotdepasseUtilisateur(Request $request )
   {
     $email= $request->input('email');
     $password= $request->input('password');
     $password_confirmation= $request->input('password_confirmation');  
     
     $user = User::where('email', $email)->first();
   
     if (!$user) {
        return redirect()->route('motdepasseutilisateur.reinitialiser')->with('statut', 'Utilisateur inexistant. Verifier votre adresse mail');
       }  else {
        if($password != $password_confirmation){
            return redirect()->back()->with('statut', 'les mots de passe saisis sont differents');
         } else{
         
          User::where('email', $email)->update([
         'password' => Hash::make($request->password),]);
          return redirect()->route('login')->with('statut', 'Mot de reinitialisé modifié avec succès');
         //return redirect()->route('accueil')->with('statut', 'Mot de passe modifié avec succès');
         }
    } 
      
   } 
}
