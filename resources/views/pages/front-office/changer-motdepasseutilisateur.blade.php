<x-guest-layout>
    <x-auth-card>
        <head>
 
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
            <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
            <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
             
         <!-- Include Bootstrap CSS -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <x-slot name="logo">
              <div >
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                <img class="rounded mx-auto d-block" src="{{ asset('../Image_drapeau_burkina.png') }}" style="height: 50px" alt="">
                
                    <p style="text-align: center; font-weight: bold"> eCDA-BURKINA FASO</p>
                    <p style="font-style:italic; font-weight: bold">Archivage des Documents Cadastraux</p>
                </div>
                
            <br>
            
            @if (session('statut'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{session('statut')}} 
            </div>
            @endif 
            @if (session('statut1'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
              </button>
              {{session('statut1')}} 
            </div>
            @endif 
 
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('enregistrer.nouveaumotdepasseutilisateur') }}">
            @csrf

            <!-- Password Reset Token -->
            {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email"  value="{{ Auth::user()->email}}" required autofocus aria-describedby="helpId" readonly/>
            </div>

            <!-- Old Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Ancien Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="old_password" value="{{ Auth::user()->password}}" required autofocus aria-describedby="helpId" readonly required />
            </div>

              <!-- New Password -->
              <div class="mt-4">
                <x-label for="password" :value="__('Nouveau Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer Nouveau Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>
           

            <div class="flex items-center justify-end mt-4">
                <a href="javascript:history.back()" class="btn btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a> 
                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
                <x-button>
                    {{-- {{ __('Reinitialiser Mot de Passe') }}--}}
                    {{ __('Changer Mot de Passe') }}
                </x-button>
            </div>
          
        </form>
    </x-auth-card>
</x-guest-layout>
