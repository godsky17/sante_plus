@extends('layouts.auth')

@section('title', 'Inscription docteur - Santé Plus')
@section('css')
    <link href="{{ asset('css/multiform.css') }}" rel="stylesheet">
@endsection

@section('auth-content')

    <div class="col-md-8 col-lg-12 mx-auto">
        <div id="container" class="mx-auto">

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="progress px-1" style="height: 3px;">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            <div class="step-container d-flex justify-content-between">
                <div class="step-circle" onclick="displayStep(1)">1</div>
                <div class="step-circle" onclick="displayStep(2)">2</div>
                <div class="step-circle" onclick="displayStep(3)">3</div>
            </div>

            <form id="multi-step-form" method="POST" action="{{ route('register.hopital') }}">
                @csrf
                <div class="step step-1">
                    <h3>Informations générales</h3>
                    <!-- Step 1 form fields here -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('hopital_name') is-invalid @enderror"
                                    id="floatingInput" name="hopital_name" value='{{ old('hopital_name') }}'
                                    placeholder="Nom">
                                <label for="floatingInput">Nom de l'hopital</label>
                                @error('hopital_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInput" name="email" value='{{ old('email') }}' placeholder="Email">
                                <label for="floatingInput">Email</label>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                                    id="floatingInput" name="telephone" value='{{ old('telephone') }}'
                                    placeholder="Téléphone">
                                <label for="floatingInput">Téléphone</label>
                                @error('telephone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                                    id="floatingInput" name="adresse" value='{{ old('adresse') }}'
                                    placeholder="Adresse complète">
                                <label for="floatingInput">Adresse complète</label>
                                @error('adresse')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary next-step">Suivant</button>
                </div>

                <div class="step step-2">
                    <!-- Step 2 form fields here -->
                    <h3>Présentation & statut</h3>
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('description') is-invalid @enderror" value='{{ old('description') }}'
                                placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"
                                value="{{ old('description') }}"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select  @error('type_etablissement') is-invalid @enderror"
                                id="floatingSelect" name="type_etablissement" aria-label="Floating label select example">
                                <option selected>Ouvrir ce menu de sélection</option>
                                <option value="public">Public</option>
                                <option value="prive">Privé</option>
                                <option value="clinique">Clinique</option>
                            </select>
                            <label for="floatingSelect">Sélectionner le type d'établissement</label>

                            @error('type_etablissement')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary prev-step">Pécédent</button>
                    <button type="button" class="btn btn-primary next-step">Suivant</button>
                </div>

                <div class="step step-3">
                    <!-- Step 3 form fields here -->
                    <h3>Compte administrateur</h3>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('nom_admin') is-invalid @enderror"
                                        id="floatingInput" name="nom_admin" placeholder=""
                                        value="{{ old('nom_admin') }}">
                                    <label for="floatingInput">Nom</label>
                                    @error('nom_admin')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('prenom_admin') is-invalid @enderror"
                                        id="floatingPassword" name="prenom_admin" placeholder=""
                                        value="{{ old('prenom_admin') }}">
                                    <label for="floatingPassword">Prénom</label>
                                    @error('prenom_admin')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email_admin') is-invalid @enderror"
                                        id="floatingInput" name="email_admin" placeholder="" value="{{ old('email_admin') }}">
                                    <label for="floatingInput">Email</label>
                                    @error('email_admin')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('telephone_admin') is-invalid @enderror"
                                        id="floatingPassword" name="telephone_admin" placeholder="Téléphone"
                                        value="{{ old('telephone_admin') }}">
                                    <label for="floatingPassword">Numéro de téléphone</label>
                                    @error('telephone_admin')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="floatingInput" name="password" placeholder="password">
                                    <label for="floatingInput">Mot de passe</label>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="floatingInput" name="password_confirmation" placeholder="password">
                                    <label for="floatingInput">Confirmation mot de passe</label>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary prev-step">Pécédent</button>
                    <button type="submit" class="btn btn-success">Suivant</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentStep = 1;
            const steps = document.querySelectorAll(".step");
            const progress = document.querySelector(".progress-bar");

            function showStep(step) {
                steps.forEach((s, index) => {
                    s.style.display = index === step - 1 ? "block" : "none";
                });
                progress.style.width = ((step - 1) / (steps.length - 1)) * 100 + "%";
            }

            document.querySelectorAll(".next-step").forEach(btn =>
                btn.addEventListener("click", () => {
                    if (currentStep < steps.length) {
                        currentStep++;
                        showStep(currentStep);
                    }
                })
            );

            document.querySelectorAll(".prev-step").forEach(btn =>
                btn.addEventListener("click", () => {
                    if (currentStep > 1) {
                        currentStep--;
                        showStep(currentStep);
                    }
                })
            );

            window.displayStep = function(n) {
                currentStep = n;
                showStep(n);
            }

            showStep(currentStep);
        });
    </script>
@endsection
