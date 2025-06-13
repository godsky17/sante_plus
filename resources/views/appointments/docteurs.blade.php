@extends('layouts.app')

@section('title', 'Docteur - Santé Plus')

@section('content')
<main class="container">
<div class="p-5 bg-primary-me rounded-4 my-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-white">Consultez en toute confiance un médecin en ligne aujourd’hui</h2>
            </div>
        </div>
    </div>

    <div class="symptomes_wrapper my-5">
        <p class="text-bold">38 résultats pour Medecin generaliste</p>

        <div class="row symptomes">
            <div class="col-md-12 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center symptomes border border-primary-me p-3 px-4 rounded">
                    <div class="informations ">
                        <img src="{{ asset('images/person.svg') }}" alt="" class="profil_photo rounded-circle p-2 bg-gray-me mb-2" width="80">
                        <h3 class="text-black">Mr Antoine GANDON</h3>
                        <p class="fst-italic">Medecin generaliste</p>
                    </div>
                    <div class="row information_price ">
                        <div class="col-12">
                            <p class="mb-1">Tarif</p>
                            <h2>3000 Fcfa</h2>
                        </div>
                        <div class="col-12">
                            <p class="mb-1">Ville</p>
                            <h2>Cotonou</h2>
                        </div>
                    </div>
                    <div class="disponibilites">
                        <div class="row d-flex justify-content-around align-item-center ">
                            <div class="col day">
                                <h5 class="text-primary-me text-bold">Lun</h5>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-around align-item-center ">
                            <div class="col day">
                                <h5 class="text-primary-me text-bold">Lun</h5>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                        </div>
                        
                        <div class="row d-flex justify-content-around align-item-center ">
                            <div class="col day">
                                <h5 class="text-primary-me text-bold">Lun</h5>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                            <div class="col hours">
                                <p class="bg-primary-me py-1 px-2 cursor text-bold">8:00</p>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-pill w-100">Voir agenda</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center my-5 py-5 ">
        <a href="" class="btn btn-outline-primary rounded px-5">Afficher plus</a>
    </div>
</main>
@endsection