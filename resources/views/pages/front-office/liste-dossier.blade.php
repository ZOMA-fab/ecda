@extends('pages.front-office.menu')

@section('contenu')

<!-- Include required CSS -->
<link rel="stylesheet" href="{{ asset('plugins/datatables/css/liste.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if (session('statut'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session('statut') }} 
        </div> 
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des TMA Archivés</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="listearchives" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th> <!-- Order number column -->
                                    <th>Date Saisie</th>
                                    <th>Code TMA</th>
                                    <th>Nom TMA</th>
                                    <th>Type TMA</th>
                                    <th>Type Dossier TMA</th>
                                    <th class="exclude">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lesdossiers as $index => $lesdossier)
                                    <tr>
                                        <td>{{ $index + 1 }}</td> <!-- Display order number -->
                                        <td>{{ $lesdossier->date_saisie }}</td>
                                        <td>{{ $lesdossier->code_tma }}</td>
                                        <td>{{ $lesdossier->nom_tma }}</td>
                                        <td>{{ $lesdossier->type_tma }}</td>
                                        <td>{{ $lesdossier->type_dossier_tma }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary ml-2" href="{{ route('dossier.detail', $lesdossier->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            

                                            @if (Auth::user()->profil == 'Administrateur')
                                                <!-- Edit Button -->
                                                <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#editModal{{ $lesdossier->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editModal{{ $lesdossier->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $lesdossier->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel{{ $lesdossier->id }}">Modifier une Archive</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('dossier.modifier', $lesdossier->id) }}" method="post">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="form-group">
                                                                        <label for="date_saisie{{ $lesdossier->id }}"><strong>Date saisie</strong></label>
                                                                        <input value="{{ $lesdossier->date_saisie }}" type="date" name="date_saisie" id="date_saisie{{ $lesdossier->id }}" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="code_tma{{ $lesdossier->id }}"><strong>Code TMA</strong></label>
                                                                        <input value="{{ $lesdossier->code_tma }}" type="text" name="code_tma" id="code_tma{{ $lesdossier->id }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nom_tma{{ $lesdossier->id }}"><strong>Nom TMA</strong></label>
                                                                        <input value="{{ $lesdossier->nom_tma }}" type="text" name="nom_tma" id="nom_tma{{ $lesdossier->id }}" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="type_tma{{ $lesdossier->id }}"><strong>Type TMA</strong></label>
                                                                        <select class="form-control" name="type_tma" id="type_tma{{ $lesdossier->id }}">
                                                                            <option value="{{ $lesdossier->type_tma }}">{{ $lesdossier->type_tma }}</option>
                                                                            @foreach($lestypestmas as $type)
                                                                                <option value="{{ $type->type_tma }}">{{ $type->type_tma }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="type_dossier_tma{{ $lesdossier->id }}"><strong>Type Dossier TMA</strong></label>
                                                                        <select class="form-control" name="type_dossier_tma" id="type_dossier_tma{{ $lesdossier->id }}">
                                                                            <option value="{{ $lesdossier->type_dossier_tma }}">{{ $lesdossier->type_dossier_tma }}</option>
                                                                            @foreach($lestypesdossiers as $type)
                                                                                <option value="{{ $type->type_dossier_tma }}">{{ $type->type_dossier_tma }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="row mt-4">
                                                                        <div class="col-12">
                                                                            <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Button -->
                                                <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#deleteModal{{ $lesdossier->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $lesdossier->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $lesdossier->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $lesdossier->id }}">Supprimer une Archive</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Êtes-vous sûr de vouloir supprimer cette archive : &nbsp; <strong>{{ $lesdossier->code_tma }}</strong>  ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('dossier.supprimer', $lesdossier->id) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Include required JS -->
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

<script>
    $(document).ready(function () {
        $("#listearchives").DataTable({
            responsive: true,
            lengthChange: true, // Enable length change
            autoWidth: false,
            "language": {
            "paginate": {
                "previous": "Précédent",
                "next": "Suivant"
            },
            "info": "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            "search": "Rechercher:",
            "searchPlaceholder": "Rechercher",
            "lengthMenu": "Afficher _MENU_ entrées" // Customize the length menu text
        },
        "columnDefs": [
            { "searchable": false, "targets": [6] }, // Disable searching in the 6th column (actions)
            { "searchable": true, "targets": [0, 1, 2, 3, 4, 5,] } // Enable searching in the specified columns (0 to 4)
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tout"]], // Show entries dropdown options
           
            buttons: [
                { extend: 'csv', exportOptions: { columns: ':not(.exclude)' } },
                { extend: 'excel', exportOptions: { columns: ':not(.exclude)' } },
                { extend: 'pdf', exportOptions: { columns: ':not(.exclude)' } },
                { extend: 'print', exportOptions: { columns: ':not(.exclude)' } },
            ]
        }).buttons().container().appendTo('#listearchives_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
