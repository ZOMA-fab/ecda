@extends('pages.front-office.menu')

@section('contenu')

<!-- Include required CSS -->
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des Utilisateurs</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="listeutilisateurs" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Profil</th>
                                    <th>Date création</th>
                                    <th>Date modification</th>
                                    <th class="exclude">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lesutilisateurs as $index => $utilisateur)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $utilisateur->name }}</td>
                                    <td>{{ $utilisateur->prename }}</td>
                                    <td>{{ $utilisateur->email }}</td>
                                    <td>{{ $utilisateur->profil }}</td>
                                    <td>{{ $utilisateur->created_at }}</td>
                                    <td>{{ $utilisateur->updated_at }}</td>
                                    <td class="d-flex">
                                        <button type="button" data-toggle="modal" data-target="#detail-utilisateur{{ $utilisateur->id }}"
                                            class="btn btn-primary ml-2">
                                            <svg style="width:25px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>

                                        @if (Auth::user()->profil == 'Administrateur' && $utilisateur->name !== 'admin')
                                        <!-- Edit Button -->
                                        <button type="button" data-toggle="modal"
                                            data-target="#edit-utilisateur{{ $utilisateur->id }}" class="btn btn-success ml-2">
                                            <svg style="width:25px" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>

                                        <!-- Delete Button -->
                                        <button type="button" data-toggle="modal"
                                            data-target="#delete-utilisateur{{ $utilisateur->id }}"
                                            class="btn btn-danger ml-2">
                                            <svg style="width:25px" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 12H4" />
                                            </svg>
                                        </button>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Modal Details -->
                                <div class="modal fade" id="detail-utilisateur{{ $utilisateur->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modalLabelDetails" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabelDetails">Details d'un
                                                    Utilisateur</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="container bg-light border border-secondary">
                                                        <div class="row">
                                                            <h4 class="text-center text-uppercase m-4"><strong>Details
                                                                    d'un Utilisateur</strong></h4>
                                                        </div>
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="name"><strong>Nom</strong></label>
                                                                <input value="{{ $utilisateur->name }}" type="text"
                                                                    class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="prename"><strong>Prénom</strong></label>
                                                                <input value="{{ $utilisateur->prename }}" type="text"
                                                                    class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email"><strong>Email</strong></label>
                                                                <input value="{{ $utilisateur->email }}" type="text"
                                                                    class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="profil"><strong>Profil</strong></label>
                                                                <input value="{{ $utilisateur->profil }}" type="text"
                                                                    class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="created_at"><strong>Date
                                                                        création</strong></label>
                                                                <input value="{{ $utilisateur->created_at }}"
                                                                    type="datetime" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="updated_at"><strong>Date
                                                                        modification</strong></label>
                                                                <input value="{{ $utilisateur->updated_at }}"
                                                                    type="datetime" class="form-control" readonly>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="edit-utilisateur{{ $utilisateur->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modalLabelEdit" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabelEdit">Modifier un
                                                    Utilisateur</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="container bg-light border border-secondary">
                                                        <div class="row">
                                                            <h4 class="text-center text-uppercase m-4"><strong>Modifier
                                                                    un Utilisateur</strong></h4>
                                                        </div>
                                                        <form
                                                            action="{{ route('utilisateur.modifier', $utilisateur->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="form-group">
                                                                <label for="name"><strong>Nom</strong></label>
                                                                <input value="{{ $utilisateur->name }}" type="text"
                                                                    name="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="prename"><strong>Prénom</strong></label>
                                                                <input value="{{ $utilisateur->prename }}" type="text"
                                                                    name="prename" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email"><strong>Email</strong></label>
                                                                <input value="{{ $utilisateur->email }}" type="text"
                                                                    name="email" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="profil"><strong>Profil</strong></label>
                                                                <input value="{{ $utilisateur->profil }}" type="text"
                                                                    name="profil" class="form-control">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Enregistrer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="delete-utilisateur{{ $utilisateur->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modalLabelDelete" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabelDelete">Supprimer un
                                                    Utilisateur</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Êtes-vous sûr de vouloir supprimer cet utilisateur : &nbsp; <strong>{{ $utilisateur->name }} ?</strong></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form
                                                    action="{{ route('utilisateur.supprimer', $utilisateur->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Annuler</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script src="{{ asset('dist/js/demo.js') }}"></script>

<script>
    $(document).ready(function () {
        $("#listeutilisateurs").DataTable({
            responsive: true,
            lengthChange: true, // Allows changing the number of records displayed per page
            autoWidth: false,
            language: {
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                },
                info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                search: "Rechercher:",
                searchPlaceholder: "Rechercher",
                lengthMenu: "Afficher _MENU_ entrées", // Customize the length menu text
               
            },
            columnDefs: [
                { searchable: false, targets: [7] }, // Disable searching in the actions column
                { searchable: true, targets: [0, 1, 2, 3, 4, 5, 6] } // Enable searching in other columns
            ],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tout"]], // Show entries dropdown options
            buttons: [
                { extend: 'csv', exportOptions: { columns: ':not(.exclude)' } },
                { extend: 'excel', exportOptions: { columns: ':not(.exclude)' } },
                { extend: 'pdf', exportOptions: { columns: ':not(.exclude)' } },
                { extend: 'print', exportOptions: { columns: ':not(.exclude)' } }
            ]
        }).buttons().container().appendTo('#listeutilisateurs_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection
