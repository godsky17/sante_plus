@extends('layouts.auth')

@section('title', 'Inscription docteur - Santé Plus')

@section("auth-content")

<form action="{{ route('medecin.register') }}" method="POST">


                {{--

                @if ($errors->any())
                    <div class="    ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> 
                @endif
                --}}
                    @csrf
                    <div class="title text-center mb-5">
                        <h1 class="display-5 fw-bold">Inscription</h1>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="floatingInput" name="nom" placeholder="" value="{{ old('nom') }}">
                                <label for="floatingInput">Nom</label>
                                @error('nom')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="floatingPassword" name="prenom" placeholder="" value="{{ old('prenom') }}">
                                <label for="floatingPassword">Prénom</label>
                                @error('prenom')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="" value="{{ old('email') }}">
                                <label for="floatingInput">Email</label>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="floatingPassword" name="telephone" placeholder="Téléphone" value="{{ old('telephone') }}">
                                <label for="floatingPassword">Numéro de téléphone</label>
                                @error('telephone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <select class="form-select  @error('id_hopital') is-invalid @enderror" id="floatingSelect"  name="id_hopital" aria-label="Floating label select example">
                                    <option selected>Ouvrir ce menu de sélection</option>
                                    @foreach ($hopitals as $hopital)
                                        
                                        <option value="{{ $hopital->_id }}">{{ $hopital->nom }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Sélectionner votre hopital</label>

                                @error('id_hopital')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-check">
                            <input class="form-check-input @error('conditions') is-invalid @enderror" type="checkbox" name="conditions" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                J'accepte toutes les conditions et les politiques de confidentialité
                            </label>
                            @error('conditions')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Submit button -->
                        <div class="row m-0 p-0">
                            <div class="col-md-12 m-0">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary col-12 mb-4">S'inscrire</button>
                            </div>
                        </div>
                    </div>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Vous avez deja un compte ? <a href="{{ route('auth.connexion') }}">Connectez-vous.</a></p>
                        <p>Connectez-vous avec:</p>
                        <div class="row">
                            <ul class="d-flex social-media">
                                <li>
                                    <a href="#" class="social-icon">
                                        <svg class="facebook-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="social-icon">
                                        <svg class="google-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12.545 10.239v3.821h5.445c-0.712 2.315-2.647 3.972-5.445 3.972-3.332 0-6.033-2.701-6.033-6.032s2.701-6.032 6.033-6.032c1.498 0 2.866 0.549 3.921 1.453l2.814-2.814c-1.784-1.664-4.13-2.676-6.735-2.676-5.523 0-10 4.477-10 10s4.477 10 10 10c8.396 0 10-7.496 10-10 0-0.67-0.069-1.325-0.201-1.955h-9.799z"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="social-icon">
                                        <svg class="apple-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.33-2.35 1.05-3.11z"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                            
                            
                            
                        </div>
                    </div>
                </form>  
@endsection