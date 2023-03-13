@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card bg-logo pt-5 pb-5 fs-4">
                    <div class="card-header text-center fs-1">Compte de {{ $user->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.profile.update', ['id' => $user->id]) }}">

                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom :') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value='{{ $user->name }}'
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
                                    <input id="email" type="email" value='{{ $user->email }}'
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if ($user->isUser())
                                <div>
                                    <div class="row mb-3">
                                        <label for="address"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Adresse :') }}</label>

                                        <div class="col-md-6">
                                            <input id="address" type="text"
                                                value='{{ $user->client_information->address }}'
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
                                            <input id="city" type="text"
                                                value='{{ $user->client_information->city }}'
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
                                            <input id="zip_code" type="text"
                                                value="{{ $user->client_information->zip_code }}"
                                                class="form-control @error('zip_code') is-invalid @enderror" name="zip_code"
                                                value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus>

                                            @error('zip_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row mb-3">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Téléphone :') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text"
                                        value="{{ $user->client_information->phone_number }}"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="type" value="3">
                            <input type="submit" value="Sauvegarder" class="btn btn-orange">
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
