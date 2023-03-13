@extends('layouts.app')

@section('title', 'livraisons')

@section('content')


    <div class="container-fluid main-container">

        <h1 class="display-3 title-shadow text-center">Livraisons</h1>

        <div class="d-flex">
            <div class="text-dark fs-5 bg-light-opacity rounded w-75 mx-auto containerPages">
                <img class="imgLivraison mx-auto row pt-4" src="{{ asset('assets/img/livraison.png') }}" alt="Image Livraison">
                <div class="text-center">
                    <p class="pt-4">Nous livrons maintenant gratuitement à l'intérieur d'un <b>rayon de 30KM</b> pour
                        <b>tout achat minimum de 20$.</b>
                    </p>

                    <p>Les livraisons se feront <b>une fois par semaine</b>, et nous vous contacterons pour vous aviser de
                        la journée et du moment par courriel.</p>
                </div>
            </div>
        </div>


    @endsection
