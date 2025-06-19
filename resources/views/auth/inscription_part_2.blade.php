@extends('layouts.auth_special')

@section('title', 'Qui êtes-vous ? - Santé Plus')

@section("auth-content-special")
    <div class="container login">
            <div class="wrapper">
            
                <div class="title text-black text-center mb-5">
                    <h1 class="display-5 fw-bold">Qui êtes-vous ?</h1>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert" id="alert-errors">
                        <ul class="mb-0 list-group">
                            @foreach ($errors->all() as $erreur)
                                <li class="list-group-item list-group-item-danger border-0 text-center">{{ $erreur }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <form action="{{ route('inscription.form') }}" method='GET'>
                    <div class="card_container row">

                        <div class="col-sm-12 col-md-4 mb-4">
                            <label class="radio-card"> <!-- Label englobant pour meilleure accessibilité -->
                                <input type="radio" name="user_type" value="patient" class="radio-input visually-hidden">
                                <!-- Input radio caché visuellement -->
            
                                <div
                                    class="d-flex align-items-center justify-content-center py-5 px-5 border rounded shadow-lg h-100 radio-content">
                                    <div
                                        class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                        <img src="{{ asset('images/patient.png') }}" width="50px" height="50px" alt="Patient">
                                    </div>
                                    <div>
                                        <h3 class="fs-2 text-dark m-0">Patient</h3>
                                    </div>
                                </div>
                            </label>
                        </div>
            
                        <div class="col-sm-12 col-md-4 mb-4">
                            <label class="radio-card"> <!-- Label englobant pour meilleure accessibilité -->
                                <input type="radio" name="user_type" value="docteur" class="radio-input visually-hidden">
                                <!-- Input radio caché visuellement -->
            
                                <div
                                    class="d-flex align-items-center justify-content-center py-5 px-5 border rounded shadow-lg h-100 radio-content">
                                    <div
                                        class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                        <img src="{{ asset('images/docteur.png') }}" width="50px" height="50px" alt="Docteur">
                                    </div>
                                    <div>
                                        <h3 class="fs-2 text-dark m-0">Docteur</h3>
                                    </div>
                                </div>
                            </label>
                        </div>
            
                        <div class="col-sm-12 col-md-4 mb-4">
                            <label class="radio-card"> <!-- Label englobant pour meilleure accessibilité -->
                                <input type="radio" name="user_type" value="hopital" class="radio-input visually-hidden">
                                <!-- Input radio caché visuellement -->
            
                                <div
                                    class="d-flex align-items-center justify-content-center py-5 px-5 border rounded shadow-lg h-100 radio-content">
                                    <div
                                        class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                        <img src="{{ asset('images/hopital.png') }}" width="50px" height="50px" alt="Hôpital">
                                    </div>
                                    <div>
                                        <h3 class="fs-2 text-dark m-0">Hôpital</h3>
                                    </div>
                                </div>
                            </label>
                        </div>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-5 py-5">
                        <a href="{{ route('accueil') }}" class="btn btn-outline-primary px-5">Retour</a>
                        <button class="btn btn-outline-primary px-5"  type="submit">Continuer</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
        // Attendre que le DOM soit prêt
        document.addEventListener('DOMContentLoaded', function () {
            const alertBox = document.getElementById('alert-errors');
            if (alertBox) {
                setTimeout(() => {
                    // Retire l'alerte en douceur
                    alertBox.classList.remove('show');
                    alertBox.classList.add('fade');
                    // Supprime complètement du DOM après animation
                    setTimeout(() => alertBox.remove(), 500);
                }, 4000); // 4000 ms = 4 secondes
            }
        });
</script>
@endsection