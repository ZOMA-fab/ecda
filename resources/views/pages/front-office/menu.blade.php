<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCDA-BURKINA</title>
    <!-- CSS includes -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <!--<div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>-->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <h5 class="nav-link">Gestion des documents cadastraux</h5>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{ Auth::user()->prename }} {{ Auth::user()->name }}&nbsp;&nbsp;
                    <img src="{{ asset('dist/img/android-profile-icon-2.jpg') }}" class="user-image" alt="User Image">
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('dist/img/android-profile-icon-2.jpg') }}" class="img-circle" alt="User Image">
                        <p>
                            {{ Auth::user()->prename }} {{ Auth::user()->name }}
                        </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a class="btn btn-default btn-flat" href="{{ route('motdepasseutilisateur.changer') }}">Changer mot de passe</a>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('deconnexion').submit();">Déconnexion</a>
                            <form id="deconnexion" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
         <a href="#" class="brand-link">
           <span class="logo-lg"><b><img src="{{ asset('dist/img/cartebf1.jpg') }}" style="width: 50px" alt="User Image">&nbsp; e</b>CDA</span>
         </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <!-- User info -->
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open"></li>
                    <li class="nav-header">MENU</li>
                    
                    @php
                        $profil = Auth::user()->profil;
                    @endphp
                    
                    @if ($profil == 'Administrateur')
                        <!-- Administrateur menu -->
                        <li class="nav-item">
                            <a href="{{ route('accueil') }}" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Archives<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dossier.ajout') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Saisie des Archives</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('rechercheajout.document') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter un Document</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dossier.liste') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des Archives</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Statistiques<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('touslestma.statistique') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les TMA</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tmapardatesaisie.statistique') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Par Date de Saisie</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Administration<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('utilisateur.liste') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des utilisateurs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('utilisateur.ajout') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nouvel Utilisateur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('utilisateur.crud') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Audit Utilisateur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('parametrages.ajout') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Paramétrages</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @elseif ($profil == 'Agent')
                        <!-- Agent menu -->
                        <li class="nav-item">
                            <a href="{{ route('accueil') }}" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Archives<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dossier.ajout') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Saisie des Archives</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('rechercheajout.document') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ajouter un Document</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dossier.liste') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des Archives</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Statistiques<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('touslestma.statistique') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les TMA</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tmapardatesaisie.statistique') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Par Date de Saisie</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @elseif ($profil == 'Consultant')
                        <!-- Consultant menu -->
                        <li class="nav-item">
                            <a href="{{ route('accueil') }}" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Archives<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dossier.liste') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liste des Archives</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Statistiques<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('touslestma.statistique') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tous les TMA</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tmapardatesaisie.statistique') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Par Date de Saisie</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                      @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <br>
        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                @yield('contenu')
            </div>
        </section>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2024 Direction Générale du Cadastre Minier <a href="#">ecasdastreminier.bf</a></strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
