@extends('layouts.app')

@section('content')
    <div class="container p-background">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Inscriptions') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store') }}">

                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom :') }}</label>

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
                                    <input id="password-confirm" type="password" placeholder="Confirmer votre mot de passe"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Téléphone :') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" placeholder="(819) 564-6350"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" value="Sauvegarder" class="btn btn-orange">
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Annuler</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
