<x-master-layout >
    <div class="container">
      <div class="row">
          <div class="col-md-12">
               <br>
  
          </div>
      </div>
  </div>
  
  <div class="container">
      <div class="row">
          <div class="col-md-12">
               <br>
  
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
               <br>
  
          </div>
      </div>
  </div>
  </div>
  
  <div class="container">
  <div class="row">
      <div class="col-md-12">
           <br>
  
      </div>
  </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
               <br>
      
          </div>
  </div>
  </div> 
    <div class="container bg-light">
        <div class="row">
            <div class="">
                <a href="javascript:history.back()" class="btn btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a> 
                  <br>
                  <br>
                <h3><strong>Resultat(s) Recherche de Dossier TMA</strong></h3>
   
            @if (session('statut'))
            
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{session('statut')}} 
            </div>
            
            @endif
          
            <br>
            @if ($lesresultats->count() > 0)
        <table width="150%" border="3" bordercolor="black">
            <thead >
                <tr class="" style="background-color : #D3D3D3;">
                    <td><strong>Date saisie</strong></td>
                    <td><strong>Code TMA</strong></td>
                    <td><strong>Nom TMA</strong></td>
                    <td><strong>Type TMA</strong></td>
                    <td><strong>Type dossier TMA</strong></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                @foreach ($lesresultats as $lesresultat)           
                <tr>
                    <td>{{ $lesresultat->date_saisie }}</td>
                    <td>{{ $lesresultat->code_tma }}</td>
                    <td>{{ $lesresultat->nom_tma }}</td>
                    <td>{{ $lesresultat->type_tma }}</td>
                    <td>{{ $lesresultat->type_dossier_tma }}</td>
                    <td class="d-flex">
                    <br>
                    <a class="btn btn-primary ml-2" href="{{ route('dossier.detail', $lesresultat->id)}}"><svg style="width:25px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </a>
            
                      <?php 
                      $profil=(Auth::user()->profil);
                      ?>
                      @if ( $profil=='Administrateur')
                      <button type="button"  data-toggle="modal" data-target="#editmodifier-dossier{{ $lesresultat->id }}"
                        class="btn btn-success ml-2"><svg style="width:25px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                      </button>
                      @endif
                      <div class="modal fade bd-example-modal-lg" id="editmodifier-dossier{{ $lesresultat->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modifier une Archive</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="container bg-light border border-secondary">
                                        <div class="row">
                                        <h4 class="text-center text-uppercase m-4"><strong>Modifier une Archive</strong><h4>
                                        </div>
                                        <form action="{{ route('dossier.modifier', $lesresultat->id) }}" method="post">
                                          @method("POST")<!--permet à laravel d'utiliser la méthode post -->
                                          @csrf<!--permet de securiser les données envoyées par le formulaire -->
                                          <div class="form-group">
                                            <label for=""><strong>Date saisie</strong></label>
                                            <input value="{{ $lesresultat->date_saisie}}" type="date" name="date_saisie" id="" class="form-control" aria-describedby="helpId" >
                                          </div>
                                          
                                          <div class="form-group">
                                              <label for=""><strong>Code TMA</strong></label>
                                              <input value="{{ $lesresultat->code_tma}}" type="text" name="code_tma" id="" class="form-control" aria-describedby="helpId" >
                                          </div>
                                          <div class="form-group">
                                              <label for=""><strong>Nom TMA</strong></label>
                                              <input  value="{{$lesresultat->nom_tma}}" type="text" name="nom_tma" id="" class="form-control" aria-describedby="helpId" >
                                          </div>
                                          <div class="form-group">
                                              <label for=""><strong>Type TMA</strong></label>
                                              <input value="{{$lesresultat->type_tma}}" type="text" name="type_tma" id="" class="form-control" aria-describedby="helpId" readonly>
                                              <select class="form-control" name="type_tma" id="">
                                                <option></option>
                                                @foreach($lestypestmas as $lestypestma)
                                                <option value='{{ $lestypestma->type_tma }}'>{{ $lestypestma->type_tma }}</option>
                                                @endforeach              
                                              </select>
                                          </div>
                                          <div class="form-group">
                                            <label for=""><strong>Type Dossier TMA</strong></label>
                                            <input value="{{$lesresultat->type_dossier_tma}}" type="text" name="type_dossier_tma" id="" class="form-control" aria-describedby="helpId" readonly>
                                              <select class="form-control" name="type_tma" id="">
                                                <option></option>
                                              @foreach($lestypesdossiers as $lestypesdossier)
                                              <option value='{{ $lestypesdossier->type_dossier_tma }}'>{{ $lestypesdossier->type_dossier_tma }}</option>
                                              @endforeach            
                                              </select>
                                          </div>
                                          <div class="row mt-1">
                                              <div class="form-group col-12 lg">
                                                  <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                                              </div>
                                          </div>
                                          </div>
                                       </form>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                       &nbsp;&nbsp;
                      <?php 
                      $profil=(Auth::user()->profil);
                      ?>
                      @if ( $profil=='Administrateur')
                                 <a href="#" onclick="deleteConfirm('{{'dossierItem'.$lesresultat->id}}')" class="btn btn-danger"><svg svg style="width:25px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg></a>
                      @endif 
                      <form id= "{{'dossierItem'.$lesresultat->id}}" 
                        action="#"
                        method="GET" style="display:none;">
                       @csrf
                      </form>
                      <div class="modal fade bd-example-modal-lg" id="editsupprimer-dossier{{ $lesresultat->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="eeditsupprimer-dossier">Supprimer une Archive</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="container bg-light border border-secondary">
                                        <div class="row">
                                        <h4 class="text-center text-uppercase m-4"><strong>Supprimer une Archive</strong><h4>
                                        </div>
                                        <form action="#" method="post">
                                          @method("POST")<!--permet à laravel d'utiliser la méthode post -->
                                          @csrf<!--permet de securiser les données envoyées par le formulaire -->
                                          <div class="form-group">
                                            <label for=""><strong>Date saisie</strong></label>
                                            <input value="{{ $lesresultat->date_saisie}}" type="date" name="date_saisie" id="" class="form-control" aria-describedby="helpId" readonly>
                                          </div>
                                          
                                          <div class="form-group">
                                              <label for=""><strong>Code TMA</strong></label>
                                              <input value="{{ $lesresultat->code_tma}}" type="text" name="code_tma" id="" class="form-control" aria-describedby="helpId" readonly>
                                          </div>
                                          <div class="form-group">
                                              <label for=""><strong>Nom TMA</strong></label>
                                              <input  value="{{$lesresultat->nom_tma}}" type="text" name="nom_tma" id="" class="form-control" aria-describedby="helpId" readonly>
                                          </div>
                                          <div class="form-group">
                                              <label for=""><strong>Type TMA</strong></label>
                                              <input value="{{$lesresultat->type_tma}}" type="text" name="type_tma" id="" class="form-control" aria-describedby="helpId" readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for=""><strong>Type Dossier TMA</strong></label>
                                            <input value="{{$lesresultat->type_dossier_tma}}" type="text" name="type_dossier_tma" id="" class="form-control" aria-describedby="helpId" readonly>
                                          </div>
                                          
                                          <div class="form-group col-6 lg">
                                            <input type="hidden" value="{{ Auth::user()->email}}" name="email_user" 
                                            class="form-control"> 
                                        </div>
                                          <div class="row mt-1">
                                              <div class="form-group col-12 lg">
                                                  <a href="#" onclick="deleteConfirm('{{'dossierItem'.$lesresultat->id}}')"  class="btn btn-danger btn-block">Supprimer</a>
                                                           <form id= "{{'dossierItem'.$lesresultat->id}}" 
                                                                   action="#"
                                                                  method="GET" style="display:none;">
                                                                   @csrf
                                                             </form>
                                                    
                                              </div>
                                          </div>
                                          </div>
                                       </form>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                
                @endforeach
            </tbody>
        </table>
        <br>
      
        @else
            <p> 
                Aucune archive n'a été retrouvée
            </p>
        @endif
        </div>
      </div>
    </div>
</x-master-layout>