@extends('layouts.app')

@section('title', 'profile')

@section('content')
    <h1 class="display-3 text-center">Historique des commandes</h1>
    <div class="d-grid gap-2 col-6 mx-auto w-75">
        @if ($orders->count() > 0)

            {{-- Notre accordion pour afficher les repas créer et pouvoir sélectionner modifier ou supprimer le repas --}}
            <div class="scroll-bg shadow-sm bg-logo pt-5 d-flex flex-column">
                <div class="scroll-div w-75 mx-auto bg-dark-opacity justify-self-center">
                    <?php
                    $i = 0;
                    ?>
                    @foreach ($orders as $order)
                        <div class="accordion " id="accordion<?php echo $i; ?>">
                            <div id="<?php echo $i; ?>" class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                    <button class="accordion-button collapsed btn-accordion" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>"
                                        aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
                                        Commande du {{ date('d M Y', $order->created_at->timestamp) }}
                                    </button>
                                </h2>
                                <div class="">
                                    <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse btn-accordion2"
                                        aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample"
                                        style="">
                                        <div class="accordion-body historiqueBackground">
                                            <div class="container p-1 mb-1 bg-light rounded text-center w-50 mx-auto">
                                                Portions:
                                                {{ $order->portions }}</div>
                                            <ul class="list-unstyled">
                                                @foreach ($order->meals as $meal)
                                                    <div class="container p-1 mb-1 bg-light rounded w-50 mx-auto">
                                                        <li class="text-center"> {{ $meal->name }}</li>
                                                    </div>
                                                @endforeach
                                            </ul>
                                            <div class="bg-orange p-1 mb-1 rounded text-center w-50 mx-auto">Total:
                                                {{ $order->total }}$
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>

                <a class="m-4 btn btn-orange w-50 mx-auto" href="{{ route('profile') }}">Retour au compte</a>
            </div>
        @else
            <br>
            <br>
            <div class="container p-1 mb-1 bg-light rounded text-center">

                Vous n'avez pas fait de commandes</div>
            <br>
            <br>
        @endif
    </div>
@endsection
