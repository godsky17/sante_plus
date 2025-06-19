<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('accueil');

Route::get('/auth/connexion', function () {
    return view('auth.connexion');
})->name('connexion');

Route::get('/inscription', function () {
    return view("auth.inscription");
})->name('auth.inscription');

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

Route::get('/dashboard-user', function () {
    return view("admin.index");
});

Route::post('register', [PatientController::class, 'register'])->name('patient.register');


Route::get('/test-mongo', function () {
    try {
        $users = User::all();

        if ($users->isEmpty()) {
            return 'Aucun utilisateur trouvé dans MongoDB.';
        }

        $output = "<h2>Utilisateurs MongoDB :</h2><ul>";
        foreach ($users as $user) {
            $output .= "<li>{$user->name} ({$user->email})</li>";
        }
        $output .= "</ul>";

        return $output;

    } catch (\Exception $e) {
        return "❌ Erreur MongoDB : " . $e->getMessage();
    }
});



