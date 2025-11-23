@extends('others.others_layout.master')

@section('others_css')
@endsection

@section('others_content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            {{-- <a class="logo" href="{{ route('dashboard') }}"><img class="img-fluid for-light"
                                    src="{{ asset('assets/logo/logo-homess.png') }}" alt="looginpage"></a></div> --}}
                        <div class="login-main">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form class="theme-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h6 class="text-center"><a class="logo" href="{{ route('dashboard') }}"><img class="img-fluid for-light"
                                    src="{{ asset('assets/logo/logo-homess.png') }}" alt="looginpage" width="120px"></a></h6>
                                {{-- <p class="text-center">Veuillez vous connecter à votre compte et commencer l'aventure.</p> --}}
                                <div class="form-group">
                                    <label class="col-form-label">Adresse email</label>
                                    <input class="form-control" type="email" name="email" :value="old('email')" required="Veuillez entrer votre adresse email"
                                        placeholder="Test@gmail.com">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Mot de passe</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" :value="old('password')"
                                            required="Veuillez entrer votre mot de passe" placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" name="remember">
                                        <label class="text-muted" for="checkbox1">Se rappeler de moi </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="link" href="{{ route('password.request') }}">
                                            Mot de passe oublié?
                                        </a>
                                    @endif
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Connexion </button>
                                    </div>
                                </div>
                                <div class="login-social-title">
                                    <h6>Connectez-vous avec</h6>
                                </div>
                                <div class="form-group">
                                    <ul class="login-social">
                                        <li><a href="https://www.linkedin.com" target="_blank"><i
                                                    data-feather="linkedin"></i></a></li>
                                        <li><a href="https://twitter.com" target="_blank"><i
                                                    data-feather="twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com" target="_blank"><i
                                                    data-feather="facebook"></i></a></li>
                                        <li><a href="https://www.instagram.com" target="_blank"><i
                                                    data-feather="instagram"></i></a></li>
                                    </ul>
                                </div>
                                <p class="mt-4 mb-0 text-center">Nouveau sur Siha?<a class="ms-2"
                                        href="{{ route('register') }}">Créer un compte</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('others_script')
@endsection