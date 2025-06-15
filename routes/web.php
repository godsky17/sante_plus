<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("index");
});

Route::get('/auth/connexion', function () {
    return view('auth.connexion');
});

Route::get('/auth/connexion', function () {
    return view('auth.connexion');
})->name('connexion');

Route::get('/', function () {
    return view('index');
})->name('accueil');

Route::get('/inscription', function () {
    return view("auth.inscription");
});

Route::get('/inscription/qui', function () {
    return view("auth.inscription_part_2");
});

Route::get('/symptomes', function () {
    return view("appointments.symptomes");
});

Route::get('/specialistes', function () {
    return view("appointments.specialistes");
});

Route::get('/appointments/remerciement', function () {
    return view("appointments.remerciement_rdv");
});

Route::get('/appointments/docteur', function () {
    return view("appointments.profil_docteur");
});

Route::get('/appointments/docteurs', function () {
    return view("appointments.docteurs");
});




