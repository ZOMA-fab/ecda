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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 >Résultat(s) Recherche Statistiques des TMA par période </h3>
                    </div>

                    <br>

                    <!-- Data Table -->
                    <div class="card-body">
                    <!-- /.card-header -->
                    @if(isset($date_debut) && isset($date_fin))
                        <p>&nbsp;&nbsp;&nbsp;Date de début : <strong><input type="text" value="{{ $date_debut }}" readonly></strong></p>
                        <p>&nbsp;&nbsp;&nbsp;Date de fin : <strong><input type="text" value="{{ $date_fin }}" readonly></strong></p>
                    @endif
                        <table id="statistiquetmapardatesaisie" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Type TMA</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $item)
                                    <tr>
                                        <td>{{ $item->type_tma }}</td>
                                        <td>{{ $item->total }}</td>
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
        $("#statistiquetmapardatesaisie").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            dom: 'Bfrtip', // Define the table control elements
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            language: {
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                },
                info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                search: "Rechercher:",
                searchPlaceholder: "Rechercher"
            },
            columnDefs: [
                { searchable: true, targets: [0, 1] } // Enable searching in the specified columns (0 to 1)
            ]
        }).buttons().container().appendTo('#statistiquetmapardatesaisie_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
