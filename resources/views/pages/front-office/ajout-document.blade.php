@extends('pages.front-office.menu')
@section('contenu')

<!-- Include External CSS -->
@extends('pages.front-office.code-stylesheet')

<!-- Main Container -->
<div class="container">
    <!-- Success Alert -->
    @if (session('statut'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session('statut') }}
        </div>
    @endif
    
    <!-- Error Alert -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Container -->
    <div class="container bg-light border">
        <div class="form-2-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col form-2-box wow fadeInUp">
                        <br>
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-12">
                                        <!-- Card for Adding Document -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title"><strong>Ajouter un document à un dossier déjà archivé</strong></h3>
                                            </div>
                                            <br>

                                            <!-- Form to Add Document -->
                                            <form action="{{ route('ajout.document') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group col-10 lg">
                                                    <label for="code_tma"><strong>Code TMA</strong></label>
                                                    <input type="text" name="code_tma" id="code_tma" class="form-control" value="{{ $lesresultatsrecherchetmaaajoutes->code_tma }}" readonly>
                                                </div>

                                                <div class="form-group col-10 lg">
                                                    <label for="nom_tma"><strong>Nom TMA</strong></label>
                                                    <input type="text" name="nom_tma" id="nom_tma" class="form-control" value="{{ $lesresultatsrecherchetmaaajoutes->nom_tma }}" readonly>
                                                </div>

                                                <div class="form-group col-10 lg">
                                                    <label for="type_tma"><strong>Type TMA</strong></label>
                                                    <input type="text" name="type_tma" id="type_tma" class="form-control" value="{{ $lesresultatsrecherchetmaaajoutes->type_tma }}" readonly>
                                                </div>

                                                <div class="form-group col-10 lg">
                                                    <label for="type_dossier_tma"><strong>Type Dossier</strong></label>
                                                    <input type="text" name="type_dossier_tma" id="type_dossier_tma" class="form-control" value="{{ $lesresultatsrecherchetmaaajoutes->type_dossier_tma }}" readonly>
                                                </div>

                                                <div class="form-group col-10 lg">
                                                    <label for="date_saisie"><strong>Date</strong></label>
                                                    <input type="date" name="date_saisie" id="date_saisie" class="form-control" placeholder="Entrer date" required>
                                                    @error('date_saisie')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <br>

                                                <div class="form-group col-10 lg">
                                                    <label for="documents"><strong>Documents</strong></label>
                                                </div>

                                                <!-- Document Upload Table -->
                                                <fieldset class="border border-dark">
                                                    <legend class="w-auto px-2">Dossier</legend>
                                                    <table class="table table-bordered" id="dynamicAddRemove">
                                                        <tr style="background-color: rgb(196, 191, 191)">
                                                            <th>Type Document</th>
                                                            <th>Charger Document</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control" name="type_document_tma[]" required>
                                                                    <option></option>
                                                                    @foreach($ajoutlestypesdocuments as $typeDocument)
                                                                        <option value="{{ $typeDocument->type_document_tma }}">{{ $typeDocument->type_document_tma }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('type_document_tma')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input type="file" name="document_tma[]" class="form-control" placeholder="Charger Document" required>
                                                                @error('document_tma')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <button type="button" name="add" id="add-btn" class="btn btn-success">Ajouter</button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>

                                                <div class="form-group col-6 lg">
                                                    <input type="hidden" name="email_user" value="{{ Auth::user()->email }}" class="form-control">
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mt-3">
                                                    &nbsp;&nbsp;<button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                                <br>
                                            </form>
                                            <!-- End Form -->

                                            <!-- PHP Code to Generate Options -->
                                            @php
                                                $options = "";
                                                foreach ($ajoutlestypesdocuments as $typeDocument) {
                                                    $options .= "<option value='{$typeDocument->type_document_tma}'>{$typeDocument->type_document_tma}</option>";
                                                }
                                            @endphp

                                            <!-- JavaScript for Dynamic Add/Remove -->
                                            <script type="text/javascript">
                                                var i = 0;
                                                var options = "{!! $options !!}";

                                                $("#add-btn").click(function () {
                                                    ++i;
                                                    $("#dynamicAddRemove").append('<tr><td><select class="form-control" name="type_document_tma[]"><option></option>' + options + '</select></td><td><input type="file" name="document_tma[]" class="form-control" placeholder="Charger Document"></td><td><button type="button" class="btn btn-danger remove-tr">Supprimer</button></td></tr>');
                                                });

                                                $(document).on('click', '.remove-tr', function () {
                                                    $(this).closest('tr').remove();
                                                });
                                            </script>
                                            <!-- End JavaScript -->

                                        </div>
                                        <!-- End Card -->
                                    </div>
                                    <!-- End Left Column -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Container Fluid -->
                        </section>
                        <!-- End Section Content -->
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Container -->
</div>
<!-- End Main Container -->

@endsection
