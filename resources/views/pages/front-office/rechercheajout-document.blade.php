@extends('pages.front-office.menu')
 @section('contenu')

    <div class="container">
        
    @if (session('statut'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        {{session('statut')}} 
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
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
                                  <h3 class="card-title " ><strong>Ajouter un document à un TMA déjà archivé<strong></h3>
                                </div>
                                <!-- /.card-header -->
                              
                                <!-- form start -->
                                <br>
                                    <form action="{{ route('preajout.document') }}" method="GET" role="search" enctype="multipart/form-data">
                                        <div class="input-group">
                                        <span class="input-group-btn mr-5 mt-1">
                        
                                        </span>                                                        
                                        <div class="container">
                                            <div class="row">
                                           &nbsp;
                                                <label> Code TMA : </label>
                                                <div class="col-lg-3">
                                                    <input type="text" class="form-control" name="recherche_tma_a_ajouter" placeholder="Code TMA">
                                                </div>
                                                <label>Type Dossier : </label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="recherche_type_dossier_a_ajouter" placeholder="Choisir type TMA" id="">
                                                        <option></option>
                                                        @foreach($lesrecherchestypesdossiers as $lesrecherchestypesdossier)
                                                        <option value='{{ $lesrecherchestypesdossier->type_dossier_tma }}'>{{ $lesrecherchestypesdossier->type_dossier_tma }}</option>
                                                        @endforeach              
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>      
                    </section>
                   <br>
                </div>
            </div>
        </div>
    </div> 
@endsection()