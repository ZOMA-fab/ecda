
  <body>
    
    <header>
       
        
        <!--{{-- </nav> --}}--> 
        <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
        </nav>
        <nav class="navbar navbar-expand-sm navbar-dark float-left ">
            <div class="col-md-2.5">
                <br>
                <img src="{{ asset('../cartebf.png') }}" style="height: 50px" alt="">
            </div> &nbsp; &nbsp;
            <div style="font-size: 14px; font-weight: bold">
                  eCDA-BURKINA FAS0<br>
                  Archivage des 
                  Documents Cadastraux <br>
            </div >  
        </nav>
       
        <nav class="navbar navbar-expand-sm navbar-dark float-right">

            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="collapsibleNavId">
                
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="navbar-brand text-secondary" href="{{ route('accueil') }}">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <?php 
                    $profil=(Auth::user()->profil);
                    ?>
                    @if ($profil=='Administrateur')
                    <li class="nav-item ">
                        <li class="nav-item dropdown">
                        <a class="navbar-brand text-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Archives</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('dossier.ajout') }}">Saisir des Archives</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('rechercheajout.document') }}">Ajouter un document</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('dossier.liste') }}">Listes des Archives </a>
                        </div>
                        </li>
                   </li>
                   @endif
                   @if ($profil=='Agent')
                   <li class="nav-item ">
                       <li class="nav-item dropdown">
                       <a class="navbar-brand text-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Archives</a>
                       <div class="dropdown-menu" aria-labelledby="dropdownId">
                           <a class="dropdown-item" href="{{ route('dossier.ajout') }}">Saisir des Archives</a>
                           <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('rechercheajout.document') }}">Ajouter un document</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="{{ route('dossier.liste') }}">Listes des Archives </a>
                       </div>
                       </li>
                  </li>
                  <li class="nav-item ">
                    <li class="nav-item dropdown">
                            <a class="navbar-brand text-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Statistiques</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('touslestma.statistique') }}">Tous les TMA</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('tmapardatesaisie.statistique') }}">Par Date de Saisie</a>
                            </div>
                        </li>
                    </li>
                  @endif
                  @if ($profil=='Consultant')
                  <li class="nav-item ">
                      <li class="nav-item dropdown">
                      <a class="navbar-brand text-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Archives</a>
                      <div class="dropdown-menu" aria-labelledby="dropdownId">
                          <a class="dropdown-item" href="{{ route('dossier.liste') }}">Listes des Archives </a>
                      </div>
                      </li>
                 </li>
                 <li class="nav-item ">
                    <li class="nav-item dropdown">
                            <a class="navbar-brand text-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Statistiques</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('touslestma.statistique') }}">Tous les TMA</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('tmapardatesaisie.statistique') }}">Par Date</a>
                            </div>
                        </li>
                    </li>
                  @endif
                   <?php 
                   $profil=(Auth::user()->profil);
                   ?>
                   @if ($profil=='Administrateur')
                   <li class="nav-item ">
                    <li class="nav-item dropdown">
                            <a class="navbar-brand text-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Statistiques</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('touslestma.statistique') }}">Tous les TMA</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('tmapardatesaisie.statistique') }}">Par Date de Saisie</a>
                            </div>
                        </li>
                    </li>
                    <li class="nav-item ">
                        <li class="nav-item dropdown">
                                <a class="navbar-brand text-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administration</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{route('utilisateur.liste')}}">Liste des utilisateurs</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('utilisateur.ajout')}}">Créer nouvel utilisateur</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('utilisateur.crud') }}">Audit utilisateur</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('parametrages.ajout') }}">Paramétrages</a>
                                </div>
                            </li>
                        </li>
                </li>
                    @endif
                    <!-- {{-- <li class="nav-item active">
                        <a class="nav-link" href="">{{ $titrePage ?? 'Pas de question' }} <span class="sr-only">(current)</span></a>
                    </li> --}}-->
                </ul>
                <ul class="navbar-nav">
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->prename}} {{ Auth::user()->name}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{route('logout')}}" onClick="
                                                                                event.preventDefault();
                                                                                document.getElementById('deconnexion').submit();
                                                                                ">Deconnexion</a>
                            <form id="deconnexion" method="POST" action="{{route('logout')}}">
                                @csrf
                            </form>  
                            <a class="dropdown-item" href="{{ route('motdepasseutilisateur.changer') }}">Changer mot de passe</a> 

                        </div>
   
                    
                    </li>
                  
                    <!--{{-- <li class="nav-item active">
                        <a class="nav-link" href="">{{ $titrePage ?? 'Pas de question' }} <span class="sr-only">(current)</span></a>
                    </li> --}}-->
                </ul>
                
            </div>
        </nav>
    </header>

    <main>

      {{ $slot }}
           
    </main>
    
    <br> 

    <footer class="bg-secondary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <br>
                    <img src="https://www.anptic.gov.bf/fileadmin/user_upload/armoirie-burkina-faso.png" style="height: 100px" alt="">
                </div>
                <div class="col-md-6">
                    <br>
                    Direction Générale du Cadastre Minier <br>
                    Ouagadougou <br>
                    Burkina Faso <br>
                    Contact : 76 45 51 38 <br>
                     <br>
                 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <small>
                        @Copyright 2023 | Ministere de l'Energie, des Mines et des Carrières| Burkina Faso 
                    </small>
                    <br>
                    <small>
                        v.0.1
                    </small>
                </div>
            </div>
        </div>
   </footer>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- {{-- <script type="text/javascript"> src="{{ asset('bootstrap-4/js/bootstrap.bundle.min.js') }}"</script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}-->
   <script type="text/javascript" src="{{asset('js/app2.js')}}"></script>
 
</body>
</html>
