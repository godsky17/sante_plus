<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Models\Utilisateur;
use App\Http\Controllers\patient\authController;

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

// Inscription
Route::get('/inscription', [authController::class, 'whoAreYou'])->name('inscription');
Route::get('/inscription/form', [authController::class, "inscriptionForm"])->name('inscription.form');

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

Route::get('/dashboard-user', function () {
    return view("admin.index");
});

Route::post('register', [PatientController::class, 'register'])->name('patient.register');


Route::get('/test-mongo', function () {
    try {
        $users = Utilisateur::all();

        if ($users->isEmpty()) {
            return 'Aucun utilisateur trouvé dans MongoDB.';
        }

        $output = "<h2>Utilisateurs MongoDB :</h2><ul>";
        foreach ($users as $user) {
            $output .= "<li>{$user->nom}</li>";
        }
        $output .= "</ul>";

        return $output;

    } catch (\Exception $e) {
        return "❌ Erreur MongoDB : " . $e->getMessage();
    }
});


Route::get('/test-create', function(){
    $users = new Utilisateur();
    $users->nom = "Hello";
    $save = $users->save();
    return $save; // 1
});


