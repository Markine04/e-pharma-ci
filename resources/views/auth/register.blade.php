@extends('others.others_layout.master')

@section('others_content')
<div class="container-fluid p-0"> 
    <div class="row m-0">
      <div class="col-12 p-0">    
        <div class="login-card">
          <div>
            {{-- <div><a class="logo text-center" href="{{ route('dashboard') }}">
                <img class="img-fluid for-light" src="{{ asset('assets/logo/logoSiha.png') }}" alt="looginpage"></a>
            </div> --}}
            <div class="login-main"> 
                <x-auth-session-status class="mb-4" :status="session('status')" />
              <form class="theme-form" method="POST" action="{{ route('register') }}">
                @csrf
                <h4 class="text-center">Créer votre compte</h4>
                {{-- <p class="text-center">Entrez vos informations personnelles pour créer un compte</p> --}}
                <div class="form-group">
                  <label class="col-form-label">Votre Nom & Prenoms</label>
                      <input class="form-control" type="text" :value="old('name')" required autofocus autocomplete="name" placeholder="Nom & Prenoms">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Adresse Email</label>
                  <input class="form-control" type="email"  name="email" :value="old('email')" required autofocus placeholder="Test@gmail.com">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group">
                  <label class="col-form-label">Mot de passe</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Confirmer Mot de passe</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Accepter la<a class="ms-2" href="javascript:void(0)">Politique de confidentialité</a></label>
                  </div>
                  <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Enregistrer</button>
                </div>
                <div class="login-social-title">
                  <h6>Ou connectez-vous avec                 </h6>
                </div>
                <div class="form-group">
                  <ul class="login-social">
                    <li><a href="https://www.linkedin.com" target="_blank"><i data-feather="linkedin"></i></a></li>
                    <li><a href="https://twitter.com" target="_blank"><i data-feather="twitter"></i></a></li>
                    <li><a href="https://www.facebook.com" target="_blank"><i data-feather="facebook"></i></a></li>
                    <li><a href="https://www.instagram.com" target="_blank"><i data-feather="instagram"></i></a></li>
                  </ul>
                </div>
                <p class="mt-4 mb-0 text-center">Vous avez déjà un compte?<a class="ms-2" href="{{ route('login') }}">Connectez-vous</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection