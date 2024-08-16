<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>eCDA-BURKINA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<style>
    .user-menu a {
        display: flex;
        align-items: center;
    }
    .user-menu img {
        margin-left: 10px;
    }
    .small-box {
        text-align: center;
    }
    .brand-link {
        text-align: center;
        display: block;
        background-color: #343a40; /* Optional: to match the sidebar background */
    }
    .brand-text {
        color: white;
        font-size: 1.5rem; /* Adjust size as needed */
        font-weight: bold;
        display: block;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h5 href="index3.html" class="nav-link">Gestion des documents cadastraux</h5>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="dropdown user user-menu">
            
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{ Auth::user()->prename}} {{ Auth::user()->name}} &nbsp;&nbsp;<img src="dist/img/android-profile-icon-2.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/android-profile-icon-2.jpg" class="img-circle" alt="User Image">
                <p>
                {{ Auth::user()->prename}} {{ Auth::user()->name}}
                </p>
              </li>
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a class="btn btn-default btn-flat" href="{{ route('motdepasseutilisateur.changer') }}">Changer mot de passe</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat"href="{{route('logout')}}" onClick="event.preventDefault();
                        document.getElementById('deconnexion').submit();">Deconnexion</a>
                        <form id="deconnexion" method="POST" action="{{route('logout')}}">
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

      </div>

      <!-- SidebarSearch Form -->
      <!--<div class="form-inline">-->
       <!-- <div class="input-group" data-widget="sidebar-search">-->
       <!--   <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">-->
        <!--  <div class="input-group-append">-->
        <!--    <button class="btn btn-sidebar">-->
        <!--      <i class="fas fa-search fa-fw"></i>-->
        <!--    </button>-->
        <!--  </div>-->
       <!-- </div>-->
      <!--  </div>-->

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
  <br>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <div class="card border-dark shadow text-dark p-3 my-card" ><span aria-hidden="true"><strong><u>STATISTIQUES GLOBALES</u></strong></span></div>
            <div class="text-dark text-left mt-3"><h6><strong>Titres & Autorisations : {{ $countTMA }}</strong></h6></div>
            <div class="text-dark text-left mt-3"><h6><strong>Documents Archivés: {{ $countDocumentTMA }}</strong></h6></div>
            <br>
            <!--<div class="text-dark text-left mt-3"><h6><strong>Total : {{ $countTMA + $countDocumentTMA }}</strong></h6></div>-->
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <div class="card border-info shadow text-info p-3 my-card" style="color:white"><span class="" aria-hidden="true"><strong><u>LIENS eCDA</u></strong></span></div>
            <div class="text-info text-left mt-3"><h6><strong><a  href="{{ route('dossier.ajout') }}"><strong style="color:white">Saisir Archives</strong></a></strong></h6></div>
            <div class="text-info text-left mt-3"><h6><strong><a  href="{{ route('rechercheajout.document') }}"><strong style="color:white">Ajouter un Document</strong></a></strong></strong></h6></div>
            <div class="text-info text-left mt-3"><h6><strong><a  href="{{ route('dossier.liste') }}"><strong style="color:white">Liste Archives</strong></a></strong></strong></h6></div>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <div class="card border-info shadow text-info p-3 my-card" style="color:white"><span class="" aria-hidden="true"><strong><u>AUTRES LIENS</u></strong></span></div>
            <div class="text-info text-left mt-3"><h6><strong><a  href="https://www.cadastreminier.bf"><strong style="color:white">eMC+</strong></a></strong></h6></div>
            <div class="text-info text-left mt-3"><h6><strong><a  href="https://www.energie-mines.gov.bf"><strong style="color:white">Site Web MEMC</strong></a></strong></strong></h6></div>
            <div class="text-info text-left mt-3"><h6><strong><a  href="https://www.ecadastreminier.bf"><strong style="color:white">Site Web DGCM</strong></a></strong></strong></h6></div>
            </div>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
		    @yield('contenu')
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
        <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            
                <!-- /.col -->
           </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
       <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 &nbsp; Direction Générale du Cadastre Minier &nbsp;<a href="#">ecasdastreminier.bf</a></strong>
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
