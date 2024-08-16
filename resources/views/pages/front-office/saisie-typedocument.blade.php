<x-master-layout >

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/app3.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>



<div class="container">
    <div class="row">
        <div class="col-md-12">
             <br>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
             <br>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <br>

        </div>
    </div>
</div>
</div>

<div class="container">
<div class="row">
    <div class="col-md-12">
         <br>

    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <br>
    
        </div>
</div>
</div>
    @if (session('statut'))
        
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        {{session('statut')}} 
    </div>
       
    @endif
    <div class="container">
    <div class="container bg-light border ">
        <div class="form-2-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col form-2-box wow fadeInUp">
                    <br>
                    <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                              <!-- jquery validation -->
                              <div class="card card-primary">
                                <div class="card-header" style="background-color: rgba(133, 125, 125, 0.539)">
                                  <h3 class="card-title " ><strong>Ajouter un nouveau Type de Document<strong></h3>
                                </div>
                                <!-- /.card-header -->
                              
                                <!-- form start -->
                                <form  method="post" action="{{ route('typedocumenttma.enregistre') }}" enctype="multipart/form-data">
                                    @method("POST")
                                    @csrf
                                    <br>
                                    <div class="form-group col-10 lg">
                                    <label><strong>Date</strong></label>
                                            <input type="date" name="date_saisie" 
                                               placeholder="Entrer date" class="form-control"  >
                                           @error('date_saisie')
                                               <small class="text-danger"> {{ $message  }}</small>
                                           @enderror
                                  </div> 
                                    <!-- Informations sur le TMA -->
                                    <div class="form-group col-10 lg">
                                        <label><strong>Nouveau Type Document TMA</strong></label>    
                                            <input type="text" value="{{ old('type_document_tma')}}" name="type_document_tma" 
                                            placeholder="Entrer le nouveau type du TMA" class="form-control"> 
                                            @error('type_document_tma')
                                            <small class="text-danger"> {{ $message  }}</small>
                                            @enderror
                                    </div>
                                    
                                                        <div class="form-group col-6 lg">
                                                            <input type="hidden" value="{{ Auth::user()->email}}" name="email_user" 
                                                            class="form-control"> 
                                                        </div>
                                  
                                  <!-- /.card-body -->
                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                  </div>
                                  
                                </form>
                              </div>
                              
                    </section>
                    <br>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>  

</x-master-layout>