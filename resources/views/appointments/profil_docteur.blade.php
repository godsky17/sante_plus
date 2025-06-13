@extends('layouts.app')

@section('title', 'Docteur - Santé Plus')

@section('content')
<main class="container">
<div class="p-5 bg-primary-me rounded-4 my-4">
        <div class="row d-flex justify-content-center align-item-center">
            <div class="col-sm-1 mb-2">
                <img src="{{ asset('images/person.svg') }}" alt="" srcset="" width="80" height="80" class="bg-gray-me rounded-circle p-2">
            </div>
            <div class="col-sm-11">
                <h3 class="text-black text-white mb-2">Mr Antoine GANDON</h3>
                <p class="fst- p-0">Medecin generaliste</p>
            </div>
        </div>
    </div>

    <div class="details_wrapper bg-gray-me rounded-4 p-5">
        <h2 class="text-dark pb-3">Détails</h2>

        <div class="details">
            <div class="row mb-2">
                <div class="col-3">
                    <h5>Date</h5>
                </div>
                <div class="col-9">
                    <p>11/05/99</p>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-3">
                    <h5>Heure</h5>
                </div>
                <div class="col-9">
                    <p>8h00</p>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-3">
                    <h5>Symptomes</h5>
                </div>
                <div class="col-sm-9">
                    <span class="badge text-bg-primary px-3 py-2">Fièvre</span> 
                    <span class="badge text-bg-primary px-3 py-2">Maux de tête</span> 
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-3">
                    <h5>Type de consultation :</h5>
                </div>
                <div class="col-sm-9 d-flex gap-5">
                    <label for="type_consultation"><input type="radio" name="type_consultation" id=""> En ligne</label>
                    <label for="ph"><input type="radio" name="ph" id=""> Physique</label>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-3">
                    <h5>Frais</h5>
                </div>
                <div class="col-9 d-flex gap-5">
                    <p>3000 Fcfa</p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end align-items-center my-5 py-5 ">
        <a href="" class="btn btn-primary rounded-pill px-5">Valider mon rendez-vous</a>
    </div>
</main>
@endsection