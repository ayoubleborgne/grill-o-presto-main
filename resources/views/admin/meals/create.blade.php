@extends('layouts.app')

@section('title', 'Ajouter un repas')

@section('content')

    {{-- Notre formulaire pour la création de repas --}}
    <h1 class="display-3 text-center">Ajouter un produit</h1>
    <div class="container bg-secondary2 bg-light rounded">
        <div class="bg-logo pt-5 pb-5">
            <div class="d-grid gap-2 col-6 mx-auto ">
                <div class="row">
                    <div class="scroll-bg bg-dark-opacity text-light">
                        <form method="POST" action="{{ route('admin.meals.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="image">Image du repas :</label>
                                <input id="image" name="image" type="file"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom du produit</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="tag" class="form-label">Étiquettes</label>
                            <br>
                            @foreach ($allTags as $tag)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="tag{{ $tag->id }}" name="tags[]"
                                        value="{{ $tag->id }}" class="form-check-input">
                                    <label for="tag{{ $tag->id }}" class="from-check-label">
                                        {{ $tag->name }}</label>
                                    @error('tag')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                            <div class="mb-3">
                                <label for="price" class="form-label">Prix</label>
                                <input id="price" name="price" type="text"
                                    class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" value="Ajouter" class="btn btn-orange" onclick="return ConfirmCreateMeal('')">
                            <a href="{{ route('admin.meals.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
