@extends('layouts.app')

@section('title', 'Docteurs - Santé Plus')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<section class="hero" id="accueil">
        <div class="container col-xxl-8">
            <div class="row flex-lg-row-reverse align-items-center g-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('/images/image_hero.png')}}" class="d-block mx-lg-auto img-fluid" alt="Docteur" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3"><span class="text-primary-me">Consultez</span> un médecin, où que vous soyez.</h1>
                    <p class="lead mt-2">Avec Santé Plus, vous pouvez prendre rendez-vous et lancer une téléconsultation en quelques minutes. Plus besoin d’attendre en salle d’attente</p>
                    <div class="col-6 gap-2 d-md-flex justify-content-md-start mt-5">
                        <a type="button" class="btn btn-primary btn-lg rounded-pill">Prendre rendez-vous</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 text-center text-primary-me">Ce que vous pouvez faire avec Santé+</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="d-flex align-items-start bg-primary-me py-4 px-4 rounded">
                        <div class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <img src="./assets/images/un-evenement.png" width="50px" height="50px" alt="">
                        </div>
                        <div>
                            <h3 class="fs-2 text-white"> Prenez rendez-vous en ligneou en ligne</h3>
                            <p class="">Prenez rendez-vous en ligne ou en présentiel en quelques clics avec le professionnel de santé de votre choix.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start bg-gray-me py-4 px-4 rounded">
                            <div class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <img src="./assets/images/un-evenement.png" width="50px" height="50px" alt="">
                        </div>
                        <div>
                            <h3 class="fs-2 text-dark"> Téléconsultation</h3>
                            <p class="">Accédez à des consultations médicales à distance via visioconférence, directement depuis la plateforme.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start bg-gray-me py-4 px-4 rounded">
                            <div class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <img src="./assets/images/un-evenement.png" width="50px" height="50px" alt="">
                        </div>
                        <div>
                            <h3 class="fs-2 text-dark">Espace personnel sécurisé</h3>
                            <p class="">Gérez vos informations, vos rendez-vous, vos ordonnances et votre historique médical en toute confidentialité.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-start bg-gray-me py-4 px-4 rounded">
                            <div class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <img src="./assets/images/un-evenement.png" width="50px" height="50px" alt="">
                        </div>
                        <div>
                            <h3 class="fs-2 text-dark">Gestion administrative optimisée</h3>
                            <p class="">Tableau de bord pour la gestion des utilisateurs (médecins, patients, administrateurs), planification, rapports et plus encore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services  bg-primary-me" id="blog">
        <div class="container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 text-center text-white">Ce que vous pouvez faire avec Santé+</h2>
            <div class="row d-flex justify-content-start my-4 mt-5">
                <div class="col-8">
                    <div class="d-sm-flex align-items-start bg-white-me py-4 px-4 rounded">
                        <div class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <img src="./assets/images/un-evenement.png" width="50px" height="50px" alt="">
                        </div>
                        <div>
                            <h3 class="fs-2 text-dark">Featured title</h3>
                            <p class="">Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                                sentence
                                and probably just keep going until we run out of words.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-end my-4">
                <div class="col-8">
                    <div class="d-sm-flex align-items-start bg-white-me py-4 px-4 rounded">
                        <div class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <img src="./assets/images/un-evenement.png" width="50px" height="50px" alt="">
                        </div>
                        <div>
                            <h3 class="fs-2 text-dark">Featured title</h3>
                            <p class="">Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                                sentence
                                and probably just keep going until we run out of words.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-start my-4">
                <div class="col-8 ">
                    <div class="d-sm-flex align-items-start bg-white-me py-4 px-4 rounded">
                        <div class="icon-square d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <img src="./assets/images/un-evenement.png" width="50px" height="50px" alt="">
                        </div>
                        <div>
                            <h3 class="fs-2 text-dark">Featured title</h3>
                            <p class="">Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                                sentence
                                and probably just keep going until we run out of words.</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="faq" id="faq">
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold fs-2 mb-3 text-black">Des questions ? <br>On vous répond.</h1>
                    <p class="col-lg-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to</p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being
                                    filled with some actual content.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting
                                    happening here in terms of content, but just filling up the space to make it look, at least at first
                                    glance, a bit more representative of how this would look in a real-world application.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection