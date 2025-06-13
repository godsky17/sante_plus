@extends('layouts.app')

@section('title', 'Spécialistes - Santé Plus')

@section('content')
    <div class="container">
         <div class="p-5 bg-primary-me rounded-4 my-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-white">Consultez en toute confiance un médecin en ligne aujourd’hui</h2>
            </div>
        </div>
    </div>

    <div class="symptomes_wrapper my-5">
        <p class="text-bold">Qui souhaitez-vous consultez ?</p>

        <div class="row symptomes">
            <div class="col-md-6 mb-3">
                <div class="d-flex justify-content-between align-items-center symptomes border border-primary-me p-3  rounded">
                    <p class="m-0">Generaliste</p>
                    <input type="radio" id="symptom1">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="d-flex justify-content-between align-items-center symptomes border border-primary-me p-3  rounded">
                    <p class="m-0">ORL</p>
                    <input type="radio" id="symptom1">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="d-flex justify-content-between align-items-center symptomes border border-primary-me p-3  rounded">
                    <p class="m-0">Diététicien</p>
                    <input type="radio" id="symptom1">
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end align-items-center my-5 py-5 ">
                        <a href="" class="btn btn-primary rounded-pill px-5">Suivant</a>
                    </div>
    </div>
@endsection