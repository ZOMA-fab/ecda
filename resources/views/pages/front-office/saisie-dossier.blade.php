@extends('pages.front-office.menu')
@section('contenu')
 @extends('pages.front-office.code-stylesheet')



    <div class="container">
        @if (session('statut'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{session('statut')}} 
        </div> 
        @endif
        
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session('error') }}
        </div>
        @endif
        <div class="container bg-light border ">
        <div class="form-2-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col form-2-box wow fadeInUp">
                    <br>
                    <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                              <!-- jquery validation -->
                              <div class="card card-primary">
                                <div class="card-header" >
                                  <h3 class="card-title " ><strong>Ajouter un dossier<strong></h3>
                                </div>
                                <!-- /.card-header -->
                              
                                <!-- form start -->
                                <form  method="post" action="{{ route('dossier.enregistre') }}" enctype="multipart/form-data">
                                    @method("POST")
                                    @csrf
                                    <br>
                                    <div class="form-group col-10 lg">
                                    <label><strong>Date <label style="color:red"> *</label></strong></label>
                                            <input type="date" name="date_saisie" 
                                               placeholder="Entrer date" class="form-control"  >
                                           @error('date_saisie')
                                               <small class="text-danger"> {{ $message  }}</small>
                                           @enderror
                                  </div> 
                                    <!-- Informations sur le TMA -->
                                  <fieldset class="#">
                                  <legend class="w-auto px-2">TMA </legend>
                                    <div class="form-group col-10 lg">
                                        <label><strong>Code <label style="color:red"> *</label></strong></label>    
                                                        <input type="text" value="{{ old('code_tma')}}" name="code_tma" 
                                                           placeholder="Entrer le code du TMA" class="form-control"> 
                                                       @error('code_tma')
                                                           <small class="text-danger"> {{ $message  }}</small>
                                                       @enderror
                                    </div>
                                    <div class="form-group col-10 lg">
                                       <label><strong>Nom <label style="color:red"> *</label> </strong></label>
                                                        <input type="text" value="{{ old('nom_tma')}}" name="nom_tma" 
                                                           placeholder="Entrer le nom du tma" class="form-control">
                                                       @error('nom_tma')
                                                           <small class="text-danger"> {{ $message  }}</small>
                                                       @enderror
                                    </div>
                                    <div class="form-group col-10 lg">
                                    <label for=""><strong>Type TMA <label style="color:red"> *</label></strong></label>
                                                        <select class="form-control" name="type_tma" id="">
                                                          <option></option>
                                                          @foreach($lestypestmas as $lestypestma)
                                                          <option value='{{ $lestypestma->type_tma }}'>{{ $lestypestma->type_tma }}</option>
                                                          @endforeach              
                                                        </select>
                                                @error('type_tma')
                                                        <small class="text-danger"> {{ $message  }}</small>
                                                @enderror
                                                  
                                    </div>
                                    <div class="form-group col-10 lg">
                                    <label for=""><strong>Type Dossier <label style="color:red"> *</label></strong></label>
                                                        <select class="form-control" name="type_dossier_tma" id="">
                                                            <option></option>
                                                            @foreach($lestypesdossiers as $lestypesdossier)
                                                            <option value='{{ $lestypesdossier->type_dossier_tma }}'>{{ $lestypesdossier->type_dossier_tma }}</option>
                                                            @endforeach  
                                                        </select>
                                                     @error('type_dossier_tma')
                                                          <small class="text-danger"> {{ $message  }}</small>
                                                     @enderror
                                    </div>
                                  </fieldset>
                                  <br>
                                  <fieldset class="#">
                                  <legend class="w-auto px-2">Dossier</legend>
                                  <table  class="table table-bordered" id="dynamicAddRemove">
                                                            <tr style="background-color: rgb(196, 191, 191)">
                                                                <th>Type Document</th>
                                                                <th>Charger Document</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tr>
                                                                <tr>  
                                                                    <td>
                                                                        <select class="form-control"  name="type_document_tma[]">
                                                                            <option></option>
                                                                            @foreach($lestypesdocuments as $lestypesdocument)
                                                                            <option value='{{ $lestypesdocument->type_document_tma }}'>{{ $lestypesdocument->type_document_tma}}</option>
                                                                            @endforeach 
                                                                        </select>
                                                                        @error('type_document_tma')
                                                                        <small class="text-danger"> {{ $message  }}</small>
                                                                        @enderror
                                                                    </td>  
                                                                    <td>
                                                                        <input type="file"  name="document_tma[]" placeholder="Charger Document" class="form-control" />
                                                                        @error('document_tma')
                                                                        <small class="text-danger"> {{ $message  }}</small>
                                                                        @enderror
                                                                    </td>  
                                                                    <td><button type="button" name="add" id="add-btn" class="btn btn-success">Ajouter  </button></td>  
                                                                </tr> 
                                                            </tr>
                                                        </table>
                                                   </fieldset>
                                                        <div class="form-group col-6 lg">
                                                            <input type="hidden" value="{{ Auth::user()->email}}" name="email_user" 
                                                            class="form-control"> 
                                                        </div>
                                  </div>
                                  <!-- /.card-body -->
                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                  </div>
                                  
                                </form>
                              </div>
                              
                    </section>
                    <br>
                    </div>
                </div>
            </div>
        </div> 
        <!-- php -->
            @php
                 $options = "";
                      foreach($lestypesdocuments as $lestypesdocument) {
                      $options .= "<option value='{$lestypesdocument->type_document_tma}'>{$lestypesdocument->type_document_tma}</option>";
                }
             @endphp
     
        <!-- JavaScript -->
        <script type="text/javascript">
            var i = 0;
            var options = "{!! $options !!}";
        
            $("#add-btn").click(function () {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><select type="text" name="type_document_tma[]" placeholder="Enter type document" class="form-control"><option></option>' + options + '</select></td><td><div class="custom-file"><input type="file"  name="document_tma[]" placeholder="Charger Document" class="form-control" /></label> </div></td><td><button type="button" class="btn btn-danger remove-tr">Supprimer</button></td></tr>');
                                                                            
                                                                            
                                                                       
            });
        
            $(document).on('click', '.remove-tr', function () {
                $(this).parents('tr').remove();
            });
        </script>
        
    </div>
</div> 
 @endsection()