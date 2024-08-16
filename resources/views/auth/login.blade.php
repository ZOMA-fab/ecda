<x-guest-layout>
    <x-auth-card>
        <head>
 
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
            <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
            <link rel="stylesheet" href="{{ asset('css/style.css')  }}" >
             
           <!-- Include Bootstrap CSS -->
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <x-slot name="logo">
            
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500 " /> --}}
                <img class="rounded mx-auto d-block" src="{{ asset('../Image_drapeau_burkina.png') }}" style="height: 50px" alt="">
                <p style="text-align: center; font-weight: bold"> eCDA-BURKINA FASO</p>
                <p style="font-style:italic; font-weight: bold">Archivage des Documents Cadastraux</p>
            <br>
            @if (session('statut'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
              </button>
              {{session('statut')}} 
            </div>
            @endif 
        </x-slot>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <strong><a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('motdepasseutilisateur.saisiereinitialiser') }}">
                         {{ __('Mot de passe oublié ?') }} 
                    </a></strong>
                     {{--<a class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                        {{ __('Mot de passe oublié?') }}
                    </a>--}}
                @endif
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                <x-button class="ml-3">
                    {{ __('CONNEXION') }}
                </x-button>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
