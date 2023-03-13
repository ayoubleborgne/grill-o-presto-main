@extends('layouts.app')

@section('title', 'meals')

@section('content')

    <div class="container-fluid main-container">

        <h1 class="display-3 title-shadow text-center">Repas</h1>
        <h3 class="text-success text-center fs-3">{{ session('Success') }}</h3>

        <div class="p-background">

            <div class="text-success bg-light rounded fs-4 pt-4 pb-4 mb-4 w-75 d-flex flex-column mx-auto">
                <div class="bg-truck text-center">
                    <p class="display-5">Merci, {{ $order->name }} !</p>
                    <p>Votre commande sera livrée au : <strong>
                            {{ Str::upper($order->address) }}, {{ Str::upper($order->city) }},
                            {{ Str::upper($order->zip_code) }}
                        </strong>.</p>
                    <p>Votre commande constitue <strong>{{ $order->portions }} PORTIONS</strong>.</p>
                    <p>Votre numéro de confirmation est le : <strong>{{ $order->id }}</strong></p>
                    <p>Le total de votre commande est de :
                        <strong>{{ number_format($order->total, 2, '.', ',') }}$</strong>.
                    </p>
                    <p>Nous pouvons vous joindre au : <strong>{{ $order->phone_number }}</strong>.</p>
                    @if ($order->restriction)
                        <p>Vous avez mentionné la/les restrictions alimentaire/s suivante/s :
                            <strong>{{ $order->restriction }}</strong>
                        </p>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center d-flex">
                @foreach ($order->meals as $meal)
                    <div class="mealContainer mb-4">
                        <div class="c-card flex-grow-1">
                            <input class="mealCheck" type="checkbox" name="orderItems[]"
                                id="$orderItem_{{ $meal->id }}" checked disabled value="{{ $meal->id }}">
                            <div class="imgContainer d-flex">

                                <img class="img-thumbnail"
                                    src="{{ asset(Illuminate\Support\Facades\Storage::url($meal->image)) }}"
                                    alt="Image du repas">
                                <div class="tags">
                                    @if ($meal->tags !== null)
                                        @foreach ($meal->tags as $tag)
                                            @if ($tag->name === 'Végétarien')
                                                <img class="" src="{{ asset('assets/img/Vegan Food.svg') }}"
                                                    alt="Tag Végétarien">
                                            @endif
                                            @if ($tag->name === 'Épicé')
                                                <img class="Tag Épicé" src="{{ asset('assets/img/No Gluten.svg') }}"
                                                    alt="">
                                            @endif
                                            @if ($tag->name === 'Sans gluten')
                                                <img class="" src="{{ asset('assets/img/Chili Pepper.svg') }}"
                                                    alt="Tag Sans-gluten">
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column mx-auto">
                                <h5 class="card-title fs-3 mx-auto">
                                    {{ $meal->name }}
                                </h5>
                                <div class="d-flex card-text flex-column flex-grow-1">
                                    <p class="flex-grow-1 minH"><i>{{ $meal->description }}</i>
                                    </p>
                                    <hr />
                                    <p class="justify-self-end">
                                        <b>{{ number_format($meal->price, 2, '.', ',') }}$</b>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
