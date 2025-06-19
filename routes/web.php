<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("welcome");
});

Route::get('/accueil', function () {
    return view("index");
})->name('accueil');


Route::get('/auth/connexion', function () {
    return view("auth.connexion");
})->name('auth.connexion');

Route::get('/auth/inscription', function () {
    return view("auth.inscription");
})->name('auth.inscription');

Route::get('/appointments/inscription/qui', function () {
    return view("auth.inscription_part_2");
})->name('appointments.inscription');

Route::get('/appointments/symptomes', function () {
    return view("appointments.symptomes");
})->name('appointments.symptomes');

Route::get('/appointments/specialistes', function () {
    return view("appointments.specialistes");
})->name('appointments.specialiste');


Route::get('/appointments/remerciement', function () {
    return view("appointments.remerciement_rdv");
})->name('appointments.remerciement_rdv');

Route::get('/appointments/docteur', function () {
    return view("appointments.profil_docteur");
})->name('appointments.profil_docteur');

Route::get('/appointments/docteurs', function () {
    return view("appointments.docteurs");
})->name('appointments.docteurs');




