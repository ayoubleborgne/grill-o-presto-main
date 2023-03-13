@extends('layouts.app')

@section('title', 'profile')

@section('content')
    <h1 class="display-3 text-center">Gestion des utilisateurs</h1>
    <div class="d-flex justify-content-center fs-1"> {{ session('admin') }}</div>
    <div class="container bg-light rounded">

        <div class="bg-logo pt-5 pb-5">
            <div class="d-grid gap-2 col-6 mx-auto">
                <a class="btn btn-orange shadow-sm m-2" href="{{ route('admin.register') }}">Ajouter un employé</a>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                @if ($users->count() > 0)
                    <div class="scroll-bg bg-dark-opacity shadow-sm">
                        <div class="scroll-div-custom">
                            <?php
                            $i = 0;
                            ?>
                             @foreach ($users->sortBy('name')->sortBy('type_id') as $user)
                                <div class="accordion " id="accordion<?php echo $i; ?>">
                                    <div id="<?php echo $i; ?>" class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                            <button class="accordion-button collapsed btn-accordion" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>"
                                                aria-expanded="false" aria-controls="collapse<?php echo $i; ?>" @if ($user->type->name == "Admin") style= color:red 
                                                @elseif ($user->type->name == "Mod") style= color:green @endif>
                                                {{ $user->name }}
                                            </button>
                                        </h2>
                                        <div id="collapse<?php echo $i; ?>"
                                            class="accordion-collapse collapse btn-accordion2"
                                            aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample"
                                            style="">
                                            <div class="accordion-body">
                                                {{ $user->email }}
                                                <br>
                                                <strong> {{ $user->type->name }} </strong>
                                                <hr>
                                                <form method="POST"
                                                    action="{{ route('admin.profile.destroy', ['id' => $user->id]) }}">
                                                    <a class="btn btn-orange"
                                                        href="{{ route('admin.profile.edit', ['id' => $user->id]) }}">Modifier</a>
                                                    @csrf
                                                        @method('DELETE')
                                                        <input class="btn btn-orange" type="submit" value="Supprimer"
                                                            onclick="return ConfirmDelete('{{ $user->name }}')">
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
                    <p>Aucun compte dans le systeme.</p>
                @endif
            </div>
        </div>
    </div>
    </div>

@endsection
