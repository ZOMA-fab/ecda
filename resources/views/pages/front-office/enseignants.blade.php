 @extends('accueil')
 @section('contenu')
 @if(session('success'))
			<div class = 'alert aletrt-block alert-success'>
			<p>{!! session('success') !!}
			<button type="button" class="close" data-dismiss="alert">×</button></p>		
			</div>
 @endif()
 <!-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
 @endif -->
    <div class=" col-sm-18 ">

        <div class="panel panel-primary">

            <div class="panel-heading">
			    <h3 class="panel-title">Nouvel Enseignant</h3> 
            </div>
                 <form class="form-horizontal" action="{!! url('enseignants')!!}" method='POST' enctype="multipart/form-data">
				   {!! csrf_field() !!}
                   <div class="box-body">
				      <div class="form-group">
                         <label class="col-sm-2 control-label" for="matricule" >Matricule</label>
                         <div class="col-sm-10">
                         <input class="form-control" id="matricule" type="text" placeholder="Matricule" name = 'matricule'  >
						 <small class="error">{!! $errors->first('matricule')!!}</small>
					  </div>
                      </div>
                      <div class="form-group">
                         <label class="col-sm-2 control-label" for="nom" >Nom</label>
                         <div class="col-sm-10">
                         <input class="form-control" id="nom" type="text" placeholder="Nom" name = 'nom' >
						 <small class="error">{!! $errors->first('nom')!!}</small>
                         </div>
                      </div>
                      <div class="form-group">
                         <label class="col-sm-2 control-label" for="prenom">Prénom</label>
                         <div class="col-sm-10">
                         <input class="form-control" id="prenom" type="text" placeholder="Prenom" name = 'prenom' >
						 <small class="error">{!! $errors->first('prenom')!!}</small>
                         </div>
                      </div>
					  <div class="form-group">
                         <label class="col-sm-2 control-label" for="matiere">Matière</label>
                         <div class="col-sm-10">
                         <select name="matiere" id="matiere" class="form-control" > 
						    <option></option>
                            <option value ="Informatique">Informatique</option>
						    <option value ="Comptable">Comptable</option>		   
                         </select>
						 <small class="error">{!! $errors->first('matiere')!!}</small>
                         </div>
                      </div>
					  <div class="form-group">
                         <label class="col-sm-2 control-label" for="contact">Contact</label>
                         <div class="col-sm-10">
                         <input class="form-control" id="contact" type="text" placeholder="Contact" name = 'contact' >
						 <small class="error">{!! $errors->first('contact')!!}</small>
                         </div>
                      </div>
					   <div class="form-group">
                         <label class="col-sm-2 control-label" for="document">Document</label>
                         <div class="col-sm-10">
                         <input class="form-control" id="document" type="file" placeholder="Selectionner un document" name = 'document' >
						 <small class="error">{!! $errors->first('document')!!}</small>
                         </div>
                      </div>
                   </div>
                     <!-- /.box-body -->
                   <div class="box-footer">
                       <button class="btn btn-success pull-right" type="submit">Enregistrer</button>
                   </div>
                     <!-- /.box-footer -->
                </form>
        </div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>  
    </div>	
@endsection()