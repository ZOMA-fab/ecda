<?php

use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeTMAController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\TypeDossierController;
use App\Http\Controllers\ParametragesController;
use App\Http\Controllers\StatistiqueController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route pour afficher la page d'acceuil
Route::get('/',                                                    [MainController::class, 'afficherAcceuil'] )->name('accueil')->middleware('auth');
//Route pour afficher les statistiques sur la page d'acceuil'
//Route::get('affiche.statistique',                                  [MainController::class, 'afficheStatistique'] )->name('statistique.affiche');
#############################################################################################################
//Route pour afficher le formulaire de création des utilisateurs
Route::get('ajout.utilisateur',                                    [UserController::class, 'ajoutUtilisateur'] )->name('utilisateur.ajout');
//Route pour enregister un nouvel utilisateur
Route::post('enregistre.utilisateur',                              [UserController::class, 'enregistreUtilisateur'] )->name('utilisateur.enregistre');
//Route pour afficher les utilisateurs
Route::get('liste.utilisateur',                                    [UserController::class, 'listeUtilisateur'] )->name('utilisateur.liste');
//Route pour modifier un utilisateur
Route::post('modifier.utilisateur/{id}',                           [UserController::class, 'modifierUtilisateur'] )->name('utilisateur.modifier');
//Route pour supprimer un utilisateur 
Route::delete('supprimer.utilisateur/{id}',                           [UserController::class, 'supprimerUtilisateur'] )->name('utilisateur.supprimer');
//Route pour exporter les utilisateurs sous format excel
Route::get("exportutilisateur-excel",                              [UserController::class, "excelUtilisateursExport"])->name('excelutilisateurs.export');
//Route pour changer le mot de passe (Approche personnel)
Route::get('changer.motdepasseutilisateur',                        [UserController::class, 'changerMotdepasseUtilisateur'] )->name('motdepasseutilisateur.changer');
//Route pour enrégistrer le nouveau mot de passe (Approche personnel)
Route::post('nouveaumotdepasseutilisateur.enregistrer',            [UserController::class, 'nouveaumotdepasseUtilisateur'] )->name('enregistrer.nouveaumotdepasseutilisateur');
//Route pour afficher le crud utilisateur
Route::get('crud.utilisateur',                                     [UserController::class, 'crudUtilisateur'] )->name('utilisateur.crud');
//Route pour afficher le crud utilisateur
// ayant fait une saisie dans la table TMA
Route::get('crudsaisiedossier.utilisateur',                        [UserController::class, 'crudsaisiedossierUtilisateur'] )->name('utilisateur.crudsaisiedossier');
//Route pour afficher la vue de reinitialisation du mot de passe 
Route::get('saisiereinitialiser.motdepasseutilisateur',            [UserController::class, 'saisiereinitialiserMotdepasseUtilisateur'] )->name('motdepasseutilisateur.saisiereinitialiser');
//Route pour envoyer le lien de reinitialisation du mot de passe 
Route::post('lienreinitialiser.motdepasseutilisateur',             [UserController::class, 'lienreinitialiserMotdepasseUtilisateur'] )->name('motdepasseutilisateur.lienreinitialiser');
//Route pour afficher le formulaire de réinitialisation du mot de passe
Route::get('reinitialiser.motdepasseutilisateur',                 [UserController::class, 'reinitialiserMotdepasseUtilisateur'] )->name('motdepasseutilisateur.reinitialiser');
//Route pour afficher le formulaire de réinitialisation du mot de passe
Route::post('enregistrerreinitialiser.motdepasseutilisateur',     [UserController::class, 'enregistrerreinitialiserMotdepasseUtilisateur'] )->name('motdepasseutilisateur.enregistrerreinitialiser');
#############################################################################################################

//Route pour afficher la saisie d'un nouveau dossier'
Route::get('ajout.dossier',                                        [DossierController::class, 'ajoutDossier'] )->name('dossier.ajout');
//Route pour enregistrer des nouveaux dossiers
Route::post('enregistre.dossier',                                  [DossierController::class, 'enregistreDossier'] )->name('dossier.enregistre');
//Route pour enregistrer des nouveaux dossiers
Route::get('liste.dossier',                                        [DossierController::class, 'listeDossier'] )->name('dossier.liste');
//Route pour exporter les TMA archivés sous format excel
Route::get("exporttma-excel",                                      [DossierController::class, "excelExportTMA"])->name('excel.exporttma');
//Route pour exporter les documents des TMA archives sous format excel
Route::get("exportdocumenttma-excel",                              [DossierController::class, "excelExportdocumentTMA"])->name('excel.exportdocumenttma');
//Route pour afficher resultat de la recherche d'une archive
Route::get('recherche.dossier',                                    [DossierController::class, 'rechercheDossier'] )->name('dossier.recherche');
//Route pour modifier une archive après l'avoir affichée
Route::post('modifier.dossier/{id}',                               [DossierController::class, 'modifierDossier'] )->name('dossier.modifier');
//Route pour supprimerune notification après l'avoir affichée
Route::delete('supprimer.dossier/{id}',                               [DossierController::class, 'supprimerDossier'] )->name('dossier.supprimer');
//Route pour la vue details d'une archive  
//dans la dossier
Route::get('detail.dossier/{id}',                                  [DossierController::class, 'detailDossier'] )->name('dossier.detail');
//Route pour afficher les documents d'une archive
Route::get('document.dossier',                                     [DossierController::class, 'documentDossier'])->name('dossier.document');
//Route pour afficher la page de recherche de TMA 
//dont on veut ajouter le document
Route::get('document.rechercheajout',                              [DossierController::class, 'documentRechercheajout'])->name('rechercheajout.document');
//Route pour afficher la page d'ajout d'un document à un TMA
//déjà archivé
Route::get('document.preajout',                                     [DossierController::class, 'documentPreajout'])->name('preajout.document');
//Route pour ajouter un document à un TMA
//déjà archivé
Route::post('document.ajout',                                     [DossierController::class, 'documentAjout'])->name('ajout.document');
#############################################################################################################

//Route pour afficher la saisie d'un nouveau type TMA'
Route::get('ajout.typetma',                                        [TypeTMAController::class, 'ajoutTypeTMA'] )->name('typetma.ajout');
//Route pour enregistrer un nouveau type TMA
Route::post('enregistre.typetma',                                  [TypeTMAController::class, 'enregistreTypeTMA'] )->name('typetma.enregistre');
//Route pour recuperer la liste des Types TMA
//Route::get('liste.typetma',                                        [TypeTMAController::class, 'listeTypeTMA'] )->name('typetma.liste');

#############################################################################################################
//Route pour afficher la saisie d'un nouveau type de document'
Route::get('ajout.typedocumenttma',                                [TypeDocumentController::class, 'ajoutTypeDocument'] )->name('typedocumenttma.ajout');
//Route pour enregistrer des nouveaux dossiers
Route::post('enregistre.typedocumenttma',                          [TypeDocumentController::class, 'enregistreTypeDocument'] )->name('typedocumenttma.enregistre');

#############################################################################################################
//Route pour afficher la saisie d'un nouveau type de document'
Route::get('ajout.typedossiertma',                                [TypeDossierController::class, 'ajoutTypeDossier'] )->name('typedossiertma.ajout');
//Route pour enregistrer des nouveaux dossiers
Route::post('enregistre.typedossiertma',                          [TypeDossierController::class, 'enregistreTypeDossier'] )->name('typedossiertma.enregistre');

#############################################################################################################
//Route pour afficher la page des paramétrages
Route::get('ajout.parametrages',                                  [ParametragesController::class, 'ajoutParametrages'] )->name('parametrages.ajout');

#############################################################################################################
//Route pour afficher la page des statistiques
Route::get('statistique.touslestma',                              [StatistiqueController::class, 'touslestmaStatistique'] )->name('touslestma.statistique');
//Route pour aexporter des statistiques de tous les TMA
Route::get('statistique.touslestmaexport',                        [StatistiqueController::class, 'touslestmaexportStatistique'] )->name('touslestmaexport.statistique');
//Route pour afficher la page de recherche des statistiques par date de saisie
Route::get('statistique.tmapardatesaisie',                        [StatistiqueController::class, 'tmapardatesaisieStatistique'] )->name('tmapardatesaisie.statistique');
//Route pour afficher les resultats des statistiques par date de saisie
Route::post('statistique.resultattmapardatesaisie',                        [StatistiqueController::class, 'resultattmapardatesaisieStatistique'] )->name('resultattmapardatesaisie.statistique');
//Route pour exporter statistiques par date de saisie
Route::get('statistique.tmapardatesaisieexport',                        [StatistiqueController::class, 'tmapardatesaisieexportStatistique'] )->name('tmapardatesaisieexport.statistique');
#############################################################################################################




Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
