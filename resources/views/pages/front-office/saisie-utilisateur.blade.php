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
                                  <h3 class="card-title " ><strong>Ajouter un utilisateur<strong></h3>
                                </div>
                                <!-- /.card-header -->
                              
                                <!-- form start -->
                                   <form method="post" action="{{ route('utilisateur.enregistre') }}"> 
            @method("POST")
            @csrf
        <div class="row mt-1 ">
            <div class="form-group col-4 lg">
                <label><strong>&nbsp;&nbsp;Name</strong></label>&nbsp;&nbsp;
                <input type="text" value="{{ old('name')}}" name="name" 
                   placeholder="Entrer nom utilisateur" class="form-control">
               @error('name')
                   <small class="text-danger"> {{ $message  }}</small>
               @enderror
            </div>
            <div class="form-group col-4 lg">
                <label><strong>Prename</strong></label>
                <input type="text" value="{{ old('prename')}}" name="prename" 
                   placeholder="Entrer nom utilisateur" class="form-control">
               @error('prename')
                   <small class="text-danger"> {{ $message  }}</small>
               @enderror
            </div>
            <div class="form-group col-4 lg">
                <label><strong>Email</strong></label>
                <input type="text" value="{{ old('email')}}" name="email" 
                   placeholder="Entrer Email utilisateur" class="form-control">
               @error('email')
                   <small class="text-danger"> {{ $message  }}</small>
               @enderror
            </div>
            <br>
            <div class="form-group col-4 lg">
                <label for=""><strong>&nbsp;&nbsp;Profil</strong></label>
                <select class="form-control" name="profil" id="">
                  <option></option>
                  <option value="Administrateur" {{ old('profil')=='Administrateur' ? "selected" : ''}}>Administrateur</option>
                  <option value="Agent" {{ old('profil')=='Agent' ? "selected" : ''}}>Agent</option> 
                  <option value="Consultant" {{ old('profil')=='Consultant' ? "selected" : ''}}>Consultant</option> 
                </select>
             @error('profil')
                  <small class="text-danger"> {{ $message  }}</small>
             @enderror
              </div>
            <br>
            <div class="form-group col-4 lg">
                <label><strong>Password</strong></label>    
                <input type="password" value="{{ old('password')}}" name="password" 
                   placeholder="Entrer le mot de passe" class="form-control"> 
               @error('password')
                   <small class="text-danger"> {{ $message  }}</small>
               @enderror
                </div>
            <br>
            <div class="form-group col-4 lg">
                <label><strong>Password Confirm</strong></label>    
                <input type="password" value="{{ old('password_confirmation')}}" name="password_confirmation" 
                   placeholder="Confirmer le mot de passe" class="form-control"> 
               @error('password_confirmation')
                   <small class="text-danger"> {{ $message  }}</small>
               @enderror
            </div>

            <br>
        </div>         
        <div class="form-group row">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-customized">Enregistrer</button>
            </div>
        </div>
        </form>
                              </div>
                              
                    </section>
                    <br>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</div> 
 @endsection()