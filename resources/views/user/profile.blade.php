@extends('layouts.app')

@section('title', 'profile')

@section('content')

    @if (Auth::check() and Auth::user()->client_information)
        <div class=" container d-flex flex-column">
            <h1 class="display-5 text-center">Informations clients</h1>
            <div class="bg-light rounded mt-5">
                <div class="bg-logo">
                    <div class="col-lg-10 pt-5 pb-5 mx-auto">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nom complet:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Adresse email:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Téléphone:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> {{ Auth::user()->client_information->phone_number }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Addresse:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->client_information->address }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Code postal:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->client_information->zip_code }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div> <a class="btn btn-orange" href="{{ route('profile.history') }}">
                                {{ __('Historique des commandes') }}</a>
                        </div>
                        <div class="mt-2"> <a class="btn btn-orange" href="{{ route('profile.edit') }}">
                                {{ __('Modifier') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
