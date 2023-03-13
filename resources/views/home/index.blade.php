@extends('layouts.app')

@section('title', 'meals')

@section('content')



    @if (Auth::check() and
        (auth()->user()->isAdmin() or
            auth()->user()->isMod()))
        <div class="d-grid gap-2 col-6 mx-auto pt-5">
            <a class="btn btn-orange shadow-sm" href="{{ url('/admin/meals') }}">
                {{ config('Gestion des repas', 'Gestion des repas') }}
            </a>

            <a class="btn btn-orange shadow-sm " href="{{ url('/admin/menus') }}">
                {{ config('Gestion du menu', 'Gestion du menu') }}
            </a>

            <a class="btn btn-orange shadow-sm " href="{{ url('/admin/orders') }}">
                {{ config('Gestion des commandes', 'Gestion des commandes') }}
            </a>
            @if (Auth::check() and
                auth()->user()->isAdmin())
                <a class="btn btn-orange shadow-sm " href="{{ url('/admin/users') }}">
                    {{ config('Gestion des comptes', 'Gestion des comptes') }}
                </a>
            @endif
        </div>
    @else
        <div class="container-fluid main-container">

            <h1 class="display-3 title-shadow text-center">Menu de la semaine</h1>
            <h3 class="text-danger text-center display-5 blink_me">{{ session('Fail') }}</h3>

            <div class="p-background">
                <div class="d-flex"><img class="legend" src="{{ asset('assets/img/legende.svg') }}" alt="Légende tags">
                </div>


                @if ($menuItems->count() > 0)

                    <div class="container-fluid">
                        <form method="POST" action="{{ route('home.store') }}">
                            @csrf
                            <div class="row justify-content-center">
                                @foreach ($menuItems as $menuItem)
                                    <div class="mealContainer mb-4">
                                        <div class="c-card flex-grow-1 hover"><input class="mealCheck" type="checkbox"
                                                name="menuItems[]" id="menuItem_{{ $menuItem->id }}"
                                                value="{{ $menuItem->id }}">


                                            <div class="imgContainer d-flex">

                                                <img class="img-thumbnail"
                                                    src="{{ asset(Illuminate\Support\Facades\Storage::url($menuItem->meal->image)) }}"
                                                    alt="Image du repas">
                                                <div class="tags">
                                                    @if ($menuItem->meal->tags !== null)
                                                        @foreach ($menuItem->meal->tags as $tag)
                                                            @if ($tag->name === 'Végétarien')
                                                                <img class=""
                                                                    src="{{ asset('assets/img/Vegan Food.svg') }}"
                                                                    alt="Tag Végétarien">
                                                            @endif
                                                            @if ($tag->name === 'Épicé')
                                                                <img class="Tag Épicé"
                                                                    src="{{ asset('assets/img/Chili Pepper.svg') }}"
                                                                    alt="">
                                                            @endif
                                                            @if ($tag->name === 'Sans gluten')
                                                                <img class=""
                                                                    src="{{ asset('assets/img/No Gluten.svg') }}"
                                                                    alt="Tag Sans-gluten">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>




                                            <div class="card-body d-flex flex-column mx-auto">
                                                <h5 class="card-title fs-3 mx-auto">
                                                    {{ $menuItem->meal->name }}
                                                </h5>
                                                <div class="d-flex card-text flex-column flex-grow-1">
                                                    <p class="flex-grow-1 minH"><i>{{ $menuItem->meal->description }}</i>
                                                    </p>
                                                    <hr />
                                                    <p class="justify-self-end">
                                                        <b>{{ number_format($menuItem->meal->price, 2, '.', ',') }}$</b>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="buttonLegend" class="d-flex">
                                <div id="orderNow"><input type="submit" value="Commander"
                                        class="btn btn-orange submitOrder" disabled>
                                </div>

                        </form>
                    @else
                        <p>Aucun repas à afficher pour le moment.</p>
                @endif
            </div>
        </div>
    @endif

@endsection
