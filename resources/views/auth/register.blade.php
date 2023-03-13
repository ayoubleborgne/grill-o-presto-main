@extends('layouts.app')

@section('title', 'register')

@section('content')
    <div class="container-fluid pb-5">
        <h1 class="display-5 title-shadow text-center">Inscription</h1>
        <div class="container p-background">
            <div class="row justify-content-center ">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center fs-5">{{ __('S\'inscrire') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nom :') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" placeholder="Nom complet"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Courriel :') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="grill-o-presto@gmail.com"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe :') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" placeholder="Mot de passe"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirmation :') }}</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password"
                                            placeholder="Confirmer votre mot de passe" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Adresse :') }}</label>
                                    <div class="col-md-6">
                                        <input id="address" type="text" placeholder="475, rue du Cégep"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required autocomplete="address" autofocus>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="city"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Ville :') }}</label>
                                    <div class="col-md-6">
                                        <input id="city" type="text" placeholder="Sherbrooke,Qc"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{ old('city') }}" required autocomplete="city" autofocus>
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="zip_code"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Code postal :') }}</label>
                                    <div class="col-md-6">
                                        <input id="zip_code" type="text" placeholder="J1E 2J5"
                                            class="form-control @error('zip_code') is-invalid @enderror" name="zip_code"
                                            value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus>
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="phone_number"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Téléphone :') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" placeholder="(819) 564-6350"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ old('phone_number') }}" required
                                            autocomplete="phone_number" autofocus>
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-4"> 
                                <input type="submit" value="Sauvegarder" class="btn btn-orange ">
                                <a href="{{ url('/home') }}" class="btn btn-secondary ">Annuler</a>
                                </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
