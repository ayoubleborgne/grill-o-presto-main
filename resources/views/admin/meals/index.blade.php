@extends('layouts.app')

@section('title', 'meals')

@section('content')


    <h1 class="display-3 text-center">Gestion de repas</h1>
    <div class="menuContainer container-fluid w-75 bg-light rounded">

        <div class="bg-logo pb-5 pt-5">
            <div class="d-flex w-75 mx-auto">
                <a class="btn btn-orange shadow-sm m-2 w-100 mx-auto" href="{{ route('admin.meals.create') }}">Ajouter un
                    produit</a>
            </div>
            <div class="">
                @if ($meals->count() > 0)
                    <div class="w-75 mx-auto">
                        @foreach ($meals as $meal)
                            <form method="GET" action="{{ route('admin.meals.edit', ['meal' => $meal]) }}">
                        @endforeach
                        <div id="MenuGestionRepas" class="d-flex w-100 mb-2 mx-auto searchMenu">
                            @csrf
                            <select name="meal_id" id="meal_id" class="form-select mealRepas">
                                <option disabled selected>Modifier un repas</option>
                                @foreach ($meals as $meal)
                                    <option value="{{ $meal->id }}">{{ $meal->name }}</option>
                                @endforeach
                            </select>
                            <input id="btnModifRepas" type="submit" value="Modifier le repas"
                                class="btn btn-orange btn-sm mt-1">
                        </div>
                        </form>
                    </div>
                    {{-- Notre accordion pour afficher les repas créer et pouvoir sélectionner modifier ou supprimer le repas --}}
                    <div class="scroll-bg bg-dark-opacity shadow-sm w-75 mx-auto">
                        <div class="scroll-div text-center">
                            <?php
                            $i = 0;
                            ?>
                            @foreach ($meals as $meal)
                                <div class="accordion " id="accordion<?php echo $i; ?>">
                                    <div id="<?php echo $i; ?>" class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                            <button class="accordion-button collapsed btn-accordion" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>"
                                                aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
                                                {{ $meal->name }}
                                            </button>
                                        </h2>
                                        <div id="collapse<?php echo $i; ?>"
                                            class="accordion-collapse collapse btn-accordion2"
                                            aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample"
                                            style="">
                                            <div class="accordion-body d-flex flex-column">
                                                <img class="img-thumbnailRepas mx-auto "
                                                    src="{{ asset(Illuminate\Support\Facades\Storage::url($meal->image)) }}"
                                                    alt="Image du repas">
                                                <hr />
                                                <h5 class="card-title fs-3">
                                                    {{ $meal->name }}
                                                </h5>
                                                <br />
                                                <p class="flex-grow-1 minH"><i>{{ $meal->description }}</i></p>
                                                <hr />

                                                @foreach ($meal->tags as $tag)
                                                    <div class="pb-2">
                                                        <strong> {{ $tag->name }} </strong>
                                                        @if ($tag->name === 'Végétarien')
                                                            <img class=""
                                                                src="{{ asset('assets/img/Vegan Food.svg') }}"
                                                                alt="Tag Végétarien">
                                                        @endif
                                                        @if ($tag->name === 'Épicé')
                                                            <img class="Tag Épicé"
                                                                src="{{ asset('assets/img/Chili Pepper.svg') }}"
                                                                alt="Tag Épicé">
                                                        @endif
                                                        @if ($tag->name === 'Sans gluten')
                                                            <img class=""
                                                                src="{{ asset('assets/img/No Gluten.svg') }}"
                                                                alt="Tag Sans-gluten">
                                                        @endif
                                                    </div>
                                                @endforeach
                                                <p class="justify-self-end">
                                                    <b>{{ number_format($meal->price, 2, '.', ',') }}$</b>
                                                </p>
                                                <hr />
                                                <div class="d-flex justify-content-end">
                                                    <form method="POST"
                                                        action="{{ route('admin.meals.destroy', ['meal' => $meal]) }}">
                                                        <a class="btn btn-orange"
                                                            href="{{ route('admin.meals.edit', ['meal' => $meal]) }}">Modifier</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <input class="btn btn-danger" type="submit" value="Supprimer"
                                                            onclick="return ConfirmDeleteMeal('{{ $meal->name }}')">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p>Aucun produit à afficher pour le moment.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
