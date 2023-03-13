@extends('layouts.app')

@section('title', 'orderDetails')

@section('content')
    <h1 class="display-5 pb-3 text-center">Détails de la commande : <b class="text-success">{{ $order->id }}</b>
    </h1>
    <div class="menuContainer container-fluid bg-light rounded w-75 mx-auto fs-5">

        <div class="d-flex flex-column bg-logo pt-5 pb-5">
            <div class="container pt-3 pb-3 bg-dark-opacity p-1 mb-1 rounded text-center w-75 mx-auto">
                <p class="pt-2 text-light fs-3">Nombre de portion/s :</p>
                <div class="container p-1 mb-1 bg-light rounded w-75 mx-auto">{{ $order->portions }}
                </div>
                <hr class="mx-auto text-light w-75" />
                @if ($order->restriction)
                    <p class="text-warning fs-3">Restrictions alimentaires ? :</p>
                    <p class="container p-1 mb-1 bg-light rounded w-75 mx-auto">{{ $order->restriction }}</p>
                    <hr class="mx-auto text-light w-75" />
                @endif
                <p class="pt-2 text-light fs-3">Repas commandé/s :</p>
                <ul class="list-unstyled">
                    @foreach ($order->meals as $meal)
                        <div class="container p-1 mb-1 bg-light rounded w-75 mx-auto">
                            <li class="text-center"> {{ $meal->name }}</li>
                        </div>
                    @endforeach
                </ul>
                <hr class="mx-auto text-light w-75" />
                <p class="pt-2 text-light fs-4">Total de la commande :</p>
                <div class="bg-orange p-1 mb-1 rounded text-center w-50 mx-auto">
                    {{ number_format($order->total, 2, '.', ',') }}$
                </div>
            </div>




            <a class="m-4 btn btn-orange w-50 mx-auto" href="{{ route('admin.orders.index') }}">Retour aux commandes</a>
        </div>
    </div>

    </div>
@endsection
