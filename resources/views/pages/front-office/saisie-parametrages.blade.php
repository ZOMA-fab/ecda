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
        
    <div class="container">
    <div class="container bg-light border ">
        <div class="form-2-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col form-2-box wow fadeInUp">
                    <br>
                    <div class="row">
                        <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                          <a class="nav-link active" id="v-pills-tab1-tab" data-toggle="pill" href="#v-pills-tab1" role="tab" aria-controls="v-pills-tab1" aria-expanded="true"><strong>Type TMA</strong></a>
                          <a class="nav-link" id="v-pills-tab2-tab" data-toggle="pill" href="#v-pills-tab2" role="tab" aria-controls="v-pills-tab2" aria-expanded="true"><strong>Type Dossier</strong></a>
                          <a class="nav-link" id="v-pills-tab3-tab" data-toggle="pill" href="#v-pills-tab3" role="tab" aria-controls="v-pills-tab3" aria-expanded="true"><strong>Type Document</strong></a>
                        </div>
                        </div>
                        <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-home-tab">          
                            
                               <form  method="post" action="{{ route('typetma.enregistre') }}" enctype="multipart/form-data">
                                @method("POST")
                                @csrf                                                            
                                <br>
                                <div class="form-group col-10 lg">
                                <label><strong>Date</strong></label>
                                        <input type="date" name="date_saisie" 
                                           placeholder="Entrer date" class="form-control"  >
                                       @error('date_saisie')
                                           <small class="text-danger"> {{ $message  }}</small>
                                       @enderror
                                </div> 
                                <!-- Informations sur le TMA -->
                                <div class="form-group col-10 lg">
                                    <label><strong>Nouveau Type TMA</strong></label>    
                                        <input type="text" value="{{ old('type_tma')}}" name="type_tma" 
                                        placeholder="Entrer le nouveau type du TMA" class="form-control"> 
                                        @error('type_tma')
                                        <small class="text-danger"> {{ $message  }}</small>
                                        @enderror
                                </div>
                                
                                                    <div class="form-group col-6 lg">
                                                        <input type="hidden" value="{{ Auth::user()->email}}" name="email_user" 
                                                        class="form-control"> 
                                                    </div>
                              
                              <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                              </div>
                                                        
                            </form>
                         </div>
                          <div class="tab-pane fade" id="v-pills-tab2" role="tabpanel" aria-labelledby="v-pills-tab2-tab">
                            <!-- form start -->
                            <form  method="post" action="{{ route('typedossiertma.enregistre') }}" enctype="multipart/form-data">
                                @method("POST")
                                @csrf
                                <br>
                                <div class="form-group col-10 lg">
                                <label><strong>Date</strong></label>
                                        <input type="date" name="date_saisie" 
                                           placeholder="Entrer date" class="form-control"  >
                                       @error('date_saisie')
                                           <small class="text-danger"> {{ $message  }}</small>
                                       @enderror
                              </div> 
                                <!-- Informations sur le TMA -->
                                <div class="form-group col-10 lg">
                                    <label><strong>Nouveau Type Dossier TMA</strong></label>    
                                        <input type="text" value="{{ old('type_dossier_tma')}}" name="type_dossier_tma" 
                                        placeholder="Entrer le nouveau type du TMA" class="form-control"> 
                                        @error('type_dossier_tma')
                                        <small class="text-danger"> {{ $message  }}</small>
                                        @enderror
                                </div>
                                
                                                    <div class="form-group col-6 lg">
                                                        <input type="hidden" value="{{ Auth::user()->email}}" name="email_user" 
                                                        class="form-control"> 
                                                    </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                              </div>
                              
                            </form>
                          </div>
                          <div class="tab-pane fade" id="v-pills-tab3" role="tabpanel" aria-labelledby="v-pills-tab3-tab">
                            <!-- form start -->
                            <form  method="post" action="{{ route('typedocumenttma.enregistre') }}" enctype="multipart/form-data">
                                @method("POST")
                                @csrf
                                <br>
                                <div class="form-group col-10 lg">
                                <label><strong>Date</strong></label>
                                        <input type="date" name="date_saisie" 
                                           placeholder="Entrer date" class="form-control"  >
                                       @error('date_saisie')
                                           <small class="text-danger"> {{ $message  }}</small>
                                       @enderror
                              </div> 
                                <!-- Informations sur le TMA -->
                                <div class="form-group col-10 lg">
                                    <label><strong>Nouveau Type Document TMA</strong></label>    
                                        <input type="text" value="{{ old('type_document_tma')}}" name="type_document_tma" 
                                        placeholder="Entrer le nouveau type du TMA" class="form-control"> 
                                        @error('type_document_tma')
                                        <small class="text-danger"> {{ $message  }}</small>
                                        @enderror
                                </div>
                                
                                                    <div class="form-group col-6 lg">
                                                        <input type="hidden" value="{{ Auth::user()->email}}" name="email_user" 
                                                        class="form-control"> 
                                                    </div>
                                <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                              </div>
                              
                            </form>
                          </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>  
@endsection()