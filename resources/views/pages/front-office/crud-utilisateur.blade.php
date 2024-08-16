@extends('pages.front-office.menu')

@section('contenu')

<!-- Include Required CSS -->
<link rel="stylesheet" href="{{ asset('plugins/datatables/css/liste.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CRUD Utilisateurs</h3>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <!-- Nav Tabs -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab" aria-controls="pills-user" aria-selected="true">Utilisateur</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-saisie-dossier-tab" data-toggle="pill" href="#pills-saisie-dossier" role="tab" aria-controls="pills-saisie-dossier" aria-selected="false">Saisie dossier</a>
                            </li>
                        </ul>

                        <!-- Tab Contents -->
                        <div class="tab-content" id="pills-tabContent">

                            <!-- User Tab -->
                            <div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                                <table id="crudutilisateurs" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><strong>Nom</strong></th>
                                            <th><strong>Prénom</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Profil</strong></th>
                                            <th><strong>Date Dernière Connexion</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lescrudderniereconnexionutilisateurs as $utilisateur)
                                            <tr>
                                                <td>{{ $utilisateur->name }}</td>
                                                <td>{{ $utilisateur->prename }}</td>
                                                <td>{{ $utilisateur->email }}</td>
                                                <td>{{ $utilisateur->profil }}</td>
                                                <td>{{ $utilisateur->last_login }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Saisie Dossier Tab -->
                            <div class="tab-pane fade" id="pills-saisie-dossier" role="tabpanel" aria-labelledby="pills-saisie-dossier-tab">
                                <table id="crudutilisateursdossier" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><strong>Date</strong></th>
                                            <th><strong>Code TMA</strong></th>
                                            <th><strong>Nom TMA</strong></th>
                                            <th><strong>Type TMA</strong></th>
                                            <th><strong>Type dossier TMA</strong></th>
                                            <th><strong>User</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lescrudsaisiedossierutilisateurs as $dossier)
                                            <tr>
                                                <td>{{ $dossier->updated_at }}</td>
                                                <td>{{ $dossier->code_tma }}</td>
                                                <td>{{ $dossier->nom_tma }}</td>
                                                <td>{{ $dossier->type_tma }}</td>
                                                <td>{{ $dossier->type_dossier_tma }}</td>
                                                <td>{{ $dossier->email_user }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- End Tab Contents -->

                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Column -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container Fluid -->
</section>
<!-- End Main Content -->

<!-- Include Required JS -->
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
<script src="{{ asset('dist/js/demo.js') }}"></script>

<script>
    // Initialize DataTables for User Connection Table
    $(document).ready(function () {
        var table = $("#crudutilisateurs").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            language: {
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                },
                info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                search: "Rechercher:",
                searchPlaceholder: "Rechercher"
            },
            dom: 'Bfrtip',
            buttons: [
                { extend: 'csv', exportOptions: { columns: ':visible' } },
                { extend: 'excel', exportOptions: { columns: ':visible' } },
                { extend: 'pdf', exportOptions: { columns: ':visible' } },
                { extend: 'print', exportOptions: { columns: ':visible' } }
            ],
            columnDefs: [
                { searchable: true, targets: [0, 1, 2, 3, 4] }
            ]
        });
        table.buttons().container().appendTo('#crudutilisateurs_wrapper .col-md-6:eq(0)');
    });

    // Initialize DataTables for User Dossier Table
    $(document).ready(function () {
        var table = $("#crudutilisateursdossier").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            language: {
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                },
                info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                search: "Rechercher:",
                searchPlaceholder: "Rechercher"
            },
            dom: 'Bfrtip',
            buttons: [
                { extend: 'csv', exportOptions: { columns: ':visible' } },
                { extend: 'excel', exportOptions: { columns: ':visible' } },
                { extend: 'pdf', exportOptions: { columns: ':visible' } },
                { extend: 'print', exportOptions: { columns: ':visible' } }
            ],
            columnDefs: [
                { searchable: true, targets: [0, 1, 2, 3, 4, 5] }
            ]
        });
        table.buttons().container().appendTo('#crudutilisateursdossier_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
