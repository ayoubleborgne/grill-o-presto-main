@extends('layouts.app')

@section('title', 'menus')

@section('content')
    <h1 class="display-3 text-center">Gestion du menu</h1>
    <div class="d-flex justify-content-center fs-1"> {{ session('MenuChange') }}</div>

    <div class="menuContainer container-fluid w-75 mx-auto bg-light rounded">
        <div class="bg-logo pb-5 pt-5">
            <div class="d-flex ">
                <h2 class="display-8 p-1 text-dark mx-auto">Repas au menu: {{ $menuItemsCount }}/10</h2>
            </div>
            <form method="POST" action="{{ route('admin.menus.store') }}">
                <div id="menuAjout" class="d-flex w-75 mb-2 mx-auto searchMenu">
                    @csrf
                    <select name="meal_id" id="meal_id" class="form-select basic-single">
                        <option disabled selected>Ajouter un item au menu</option>
                        @foreach ($databaseMeals as $databaseMeal)
                            <option value="{{ $databaseMeal->id }}">{{ $databaseMeal->name }}</option>
                        @endforeach
                    </select>
                    <input id="boutonAjoutMenu" type="submit" value="Ajouter au menu"
                        class="btn btn-orange ms-2 btn-sm @php if($menuIsFull)echo "disabled" @endphp">
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($menuItemsCount > 0)
                <div class="d-flex">
                    <div class="scroll-bg bg-dark-opacity w-75 shadow-sm mx-auto">
                        <div>
                            <div class="card" style="width: 100%;">
                                <ul class="list-group list-group-flush">
                                    @foreach ($menuItems as $menuItem)
                                        <li class="menuItemLi list-group-item d-flex justify-content-between"
                                            id="meal{{ $menuItem->meal->id }}">
                                            <div class="r-auto p-2"> {{ $menuItem->meal->name }} </div>
                                            <form method="POST" class="p-2"
                                                action="{{ route('admin.menus.destroy', ['menu' => $menuItem]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-close" type="submit"> </button>
                                            </form>
                                        </li>
                                    @endforeach
                            </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.menus.destroyAll') }}">
                    <div class="d-flex p-2">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger mx-auto m-2 w-50" type="submit" value="Tout retirer">
                    </div>
                </form>
            @else
                <p>Le menu est vide.</p>
            @endif
        </div>
    </div>


@endsection
