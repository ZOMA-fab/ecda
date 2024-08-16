@extends('pages.front-office.menu')

@section('contenu')

<!-- Include required CSS -->
 @extends('pages.front-office.code-stylesheet')

<div class="container">
    <div class="container bg-light border ">
    <div class="row">
    <br><br>
        <div class="col-12">
            <br>
            <a href="javascript:history.back()" class="btn btn-primary">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
            </a>
            <br><br><br>
            <h3><strong>Details du Dossier TMA</strong></h3>
            @if (session('statut'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{ session('statut') }}
                </div>
            @endif
            <br>
            <form action="" method="post">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="code_tma"><strong>Code TMA</strong></label>
                    <input value="{{ $detaildossiers->code_tma }}" type="text" name="code_tma" id="code_tma" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="nom_tma"><strong>Nom TMA</strong></label>
                    <input value="{{ $detaildossiers->nom_tma }}" type="text" name="nom_tma" id="nom_tma" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="type_tma"><strong>Type TMA</strong></label>
                    <input value="{{ $detaildossiers->type_tma }}" type="text" name="type_tma" id="type_tma" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="type_dossier_tma"><strong>Type Dossier</strong></label>
                    <input value="{{ $detaildossiers->type_dossier_tma }}" type="text" name="type_dossier_tma" id="type_dossier_tma" class="form-control" readonly>
                </div>
                <br>
                <div class="form-group">
                    <label><strong>Documents</strong></label>
                </div>
                
                <table width="100%" border="1" class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th><strong>Type document</strong></th>
                            <th><strong>Document</strong></th>
                            <th><strong>Télécharger</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lesdocumentstmas as $lesdocumentstma)
                            <tr>
                                <td>{{ $lesdocumentstma->type_document_tma }}</td>
                                <td>{{ $lesdocumentstma->document_tma }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ asset('/storage/tma-documents/' . $lesdocumentstma->document_tma) }}">
                                        <strong>Télécharger</strong>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            </form>
        </div>
        <br>
    </div>
  </div>
</div>
@endsection
