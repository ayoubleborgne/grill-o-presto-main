@extends('layouts.app')

@section('title', 'meals')

@section('content')

    <div class="container-fluid main-container">

        <h1 class="display-3 title-shadow text-center">Commande</h1>
        <h3 class="text-success text-center fs-3">{{ session('Success') }}</h3>
        <div class="p-background">

            @if ($orderItems->count() > 0)
                <div class="container-fluid">
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf



                        <div class="row justify-content-center d-flex">
                            {{-- Portions --}}
                            <div class="text-light d-flex flex-column align-items-center m-3">
                                <p class="fs-1">Combien de portions désirez-vous?</p>

                                <div class="containerPortions">
                                    <ul class="d-flex">

                                        @foreach (['1', '2', '4', '5'] as $nbPortion)
                                            <div class="m-3 row">
                                                <li><input class="m-2" type="radio" id="radio{{ $nbPortion }}"
                                                        name="portions" value="{{ $nbPortion }}" required>
                                                    <label class="fs-4 text-light"
                                                        for="radio{{ $nbPortion }}">{{ $nbPortion }}</label>
                                                </li>
                                            </div>
                                        @endforeach
                                    </ul>

                                    <div class="d-none errorPortion fs-4 text-danger"><b>
                                            Veuillez choisir le nombre de portions
                                            désirées
                                        </b>.</div>
                                </div>
                            </div>
                            {{-- Cartes du menu --}}
                            @foreach ($orderItems as $orderItem)
                                <div class="mealContainer mb-4">
                                    <div class="c-card flex-grow-1">
                                        <input class="mealCheck" type="checkbox" name="orderItems[]"
                                            id="$orderItem_{{ $orderItem->id }}" checked disabled
                                            value="{{ $orderItem->id }}">
                                        <div class="imgContainer d-flex">

                                            <img class="img-thumbnail "
                                                src="{{ asset(Illuminate\Support\Facades\Storage::url($orderItem->image)) }}"
                                                alt="Image du repas">
                                            <div class="tags">
                                                @if ($orderItem->tags !== null)
                                                    @foreach ($orderItem->tags as $tag)
                                                        @if ($tag->name === 'Végétarien')
                                                            <img class=""
                                                                src="{{ asset('assets/img/Vegan Food.svg') }}"
                                                                alt="Tag Végétarien">
                                                        @endif
                                                        @if ($tag->name === 'Épicé')
                                                            <img class="Tag Épicé"
                                                                src="{{ asset('assets/img/No Gluten.svg') }}"
                                                                alt="">
                                                        @endif
                                                        @if ($tag->name === 'Sans gluten')
                                                            <img class=""
                                                                src="{{ asset('assets/img/Chili Pepper.svg') }}"
                                                                alt="Tag Sans-gluten">
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div class="card-body d-flex flex-column mx-auto">
                                            <h5 class="card-title fs-3 mx-auto">
                                                {{ $orderItem->name }}
                                            </h5>
                                            <div class="d-flex card-text flex-column flex-grow-1">
                                                <p class="flex-grow-1 minH"><i>{{ $orderItem->description }}</i>
                                                </p>
                                                <hr />
                                                <p class="justify-self-end">
                                                    <b>{{ number_format($orderItem->price, 2, '.', ',') }}$</b>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if (Auth::guest())
                                <div class="guestForm d-flex m-5 fs-5">

                                    {{-- gauche --}}
                                    <div class="row guestFormLeft">
                                        {{-- nom complet --}}
                                        <div class="row mb-3">
                                            <label for="name"
                                                class="col-12 col-form-label text-md-start text-light">{{ __('Nom :') }}</label>
                                            <div class="col-12">
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
                                        {{-- courriel --}}
                                        <div class="row mb-3">
                                            <label for="email"
                                                class="col-12 col-form-label text-md-start text-light">{{ __('Courriel :') }}</label>
                                            <div class="col-12">
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
                                        {{-- adresse --}}
                                        <div class="row mb-3">
                                            <label for="address"
                                                class="col-12 col-form-label text-md-start text-light">{{ __('Adresse :') }}</label>
                                            <div class="col-12">
                                                <input id="address" type="text" placeholder="475, rue du Cégep"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}" required
                                                    autocomplete="address" autofocus>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    {{-- droite --}}
                                    <div class="row guestFormRight">
                                        {{-- ville --}}
                                        <div class="row mb-3">
                                            <label for="city"
                                                class="col-12 col-form-label text-md-start text-light">{{ __('Ville :') }}</label>
                                            <div class="col-12">
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

                                        {{-- code postal --}}
                                        <div class="row mb-3">
                                            <label for="zip_code"
                                                class="col-12 col-form-label text-md-start text-light">{{ __('Code postal :') }}</label>
                                            <div class="col-12">
                                                <input id="zip_code" type="text" placeholder="J1E 2J5"
                                                    class="form-control @error('zip_code') is-invalid @enderror"
                                                    name="zip_code" value="{{ old('zip_code') }}" required
                                                    autocomplete="zip_code" autofocus>
                                                @error('zip_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- numero de telephone --}}
                                        <div class="row mb-3">
                                            <label for="phone_number"
                                                class="col-12 col-form-label text-md-start text-light">{{ __('Téléphone :') }}</label>
                                            <div class="col-12">
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
                                    </div>
                                </div>
                            @else
                                {{-- Informations clients connectés --}}
                                <div class="d-flex flex-column">
                                    <div
                                        class="clientsInfos text-dark d-flex flex-column align-self-center text-center bg-light rounded fs-5 mt-5 pb-3">
                                        <p class="align-self-center align-me w-75 fs-3">Vos informations clients pour cette
                                            commande :
                                        </p>
                                        <hr />
                                        <p class="align-self-center">Nom complet:
                                            <strong>{{ Str::upper($user->name) }}</strong>
                                        </p>
                                        <p class="align-self-center">Téléphone :
                                            <strong>{{ Str::upper($userInfo->phone_number) }}</strong>
                                        </p>
                                        <p class="align-self-center">Addresse :
                                            <strong>{{ Str::upper($userInfo->address) }}</strong>
                                        </p>
                                        <p class="align-self-center">Ville :
                                            <strong>{{ Str::upper($userInfo->city) }}</strong>
                                        </p>
                                        <p class="align-self-center">Code postal :
                                            <strong>{{ Str::upper($userInfo->zip_code) }}</strong>
                                        </p>
                                        <a class="btn btn-secondary w-50 align-self-center"
                                            href="{{ route('profile.edit') }}">Modifier ces
                                            informations</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Restrictions alimentaires --}}
                        <div class="d-flex flex-column justify-content-center align-items-center pt-2 pb-2">
                            <span>
                                <label class="text-light fs-4" for="allergies">Restrictions
                                    alimentaires?</label>
                                <input class="m-3 biggerCheck" type="checkbox" id="restrictionCheckbox"
                                    name="restriction" value="true">
                            </span>

                            <textarea class="w-100 rounded d-none fs-5" name="restrictionText" id="restrictionTextArea" cols="30"
                                rows="5"></textarea>
                        </div>

                        <div id="buttonLegend" class="d-flex">
                            <div id="orderNow"><input type="submit" value="Commander" class="btn btn-orange">
                            </div>
                        </div>
                    </form>
                @else
                    <p>Aucun repas à afficher pour le moment.</p>

            @endif
        </div>

    </div>


@endsection
