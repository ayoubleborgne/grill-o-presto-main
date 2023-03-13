@extends('layouts.app')

@section('title', 'Modifier un repas')

@section('content')

    {{-- Notre formulaire pour l'édit de repas sélectionner --}}
    <h1 class="display-3 text-center">Modifier {{ $meal->name }}</h1>
    <div class="container bg-light rounded">
        <div class="bg-logo pb-5 pt-5">
            <div class="d-grid gap-2 col-6 mx-auto ">
                <div class="row">
                    <div class="scroll-bg bg-dark-opacity text-light fs-5">
                        <form method="POST" action="{{ route('admin.meals.update', ['meal' => $meal]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="image">Image du repas :</label>
                                <br>
                                <div class="d-flex pb-3"><img class="img-thumbnailRepas mx-auto" src="{{ asset($image) }}">
                                </div>
                                <input id="image" name="image" type="file"
                                    class=" form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom du repas</label>
                                <input id="name" name="name" type="text" value='{{ $meal->name }}'
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control  @error('description') is-invalid @enderror">{{ $meal->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="tag" class="form-label">Étiquettes</label>
                            <br>
                            @foreach ($allTags as $tag)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="tag{{ $tag->id }}" name="tags[]"  value="{{$tag->id}}"
                                        class="form-check-input"
                                        @foreach ($mealTags as $mealTag)
                                        @if ($mealTag->id === $tag->id)
                                        checked
                                        @endif @endforeach>
                                    <label for="tag{{ $tag->id }}" class="from-check-label"> {{ $tag->name }}</label>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                            <div class="mb-3">
                                <label for="price" class="form-label">Prix</label>
                                <input id="price" name="price" type="text" value="{{ $meal->price }}"
                                    class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" value="Sauvegarder" class="btn btn-orange" onclick="return ConfirmUpdateMeal('{{ $meal->name }}')">
                            <a href="{{ route('admin.meals.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
