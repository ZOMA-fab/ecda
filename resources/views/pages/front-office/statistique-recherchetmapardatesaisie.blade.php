@extends('pages.front-office.menu')
@section('contenu')

<div class="container">
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session('error') }}
        </div>
    @endif
    @if (session('error1'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session('error1') }}
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
                                  <h3 class="card-title " ><strong>Recherche de Statistique des TMA par période<strong></h3>
                                </div>
                               <br>
                               <form action="{{ route('resultattmapardatesaisie.statistique') }}" method="POST" role="search" enctype="multipart/form-data">
                               @csrf
                                    <div class="input-group">
                                    <div class="container">
                                        <div class="row">
                                            <label for="date_debut">&nbsp;&nbsp;Date début: </label>
                                            <div class="col-lg-3">
                                              <input type="date" class="form-control" name="date_debut" id="date_debut" placeholder="Entrer date début">
                                            </div>
                                            <label for="date_fin">Date fin:</label>
                                            <div class="col-lg-3">
                                              <input type="date" class="form-control" name="date_fin" id="date_fin" placeholder="Entrer date fin">
                                            </div>
                                        <div class="col">
                                         <button type="submit" class="btn btn-primary">Rechercher</button>
                                        </div>
                                        </div>
                                     </div>
                                   <br>
                                  <br>
                                 </div>
                             </form>
                                <br>
                            </div>
                         </div>      
                       <br>
                </div>
            </div>
        </div>
    </div>  
@endsection