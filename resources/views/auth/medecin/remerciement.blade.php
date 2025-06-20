@extends('layouts.auth_special')

@section('title', 'Remerciements médécin - Santé Plus')

@section("auth-content-special")
  <div class="container login">
        <div class="text-center mt-5">
            <h1 class="display-5 fw-bold">Merci pour votre inscription !</h1>
            <p class="text-center w-full" width="100%">Votre inscription a bien été prise en compte. Elle sera validée par l’administrateur de votre hôpital. Vous recevrez une notification dès que votre compte sera activé. Merci de votre patience et bienvenue sur Santé Plus !</p>

            <div class="d-flex justify-content-center align-items-center my-5 mt-2 py-5 ">
            <a href="{{ route('accueil') }}" class="btn btn-primary rounded px-5">Retour à l'accueil</a>
        </div>
    </div>
@endsection