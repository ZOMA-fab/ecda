<x-master-layout >
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
    <div class="container bg-light">
        <div class="row">
            <div class="">
                <a href="javascript:history.back()" class="btn btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                  </a> 
                  <br>
                  <br>
                <h3><strong>Documents du Dossier TMA</strong></h3>
   
                <table width="150%" border="3" bordercolor="black">
                    <thead >
                        <tr class="" style="background-color : #D3D3D3;">
                            <td><strong>Type document</strong></td>
                            <td><strong>Document</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
        
                    <tbody>
                      <!--foreach à corriger-->
                      @foreach ($lesdocumentstmas as  $lesdocumentstma)  
                      <tr>
                          <td>{{ $lesdocumentstma->type_document_tma }}</td>
                          <td>{{ $lesdocumentstma->document_tma }}</td>
                        <tr>
                            <td></td>
                            <td></td>
        
                            <td class="d-flex">
                            <br>
                              <button type="button"  data-toggle="modal" data-target="#detail-dossier"
                                class="btn btn-primary ml-2"><svg style="width:25px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                              </button>
                              </div>
                              <button type="button"  data-toggle="modal" data-target="#editmodifier-dossier"
                                class="btn btn-success ml-2"><svg style="width:25px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                              </button>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   </div>
</div>

</x-master-layout>