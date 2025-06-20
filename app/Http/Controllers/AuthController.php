<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hopital;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Exception;

class AuthController extends Controller
{
    
    /**
     * Retour la page d'inscription
     * @return void
     */
    public function whoAreYou()
    {
        return view("auth.inscription_part_2");
    }

    public function inscriptionForm(Request $request)
    {
        
        $validated = $request->validate([
            'user_type' => 'required'
        ]);

        switch ($request->user_type) {
            case 'hopital':
                return view("auth.hopital.inscription");
                break;
            case 'medecin':
                # code...
                break;
            case 'patient':
                return view("auth.inscription");
                break;
            
            default:
                # code...
                break;
        }

       
    }

    public function registerHopital(Request $request)
    {
        $request->validate([
            'hopital_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:hopitaux,email',
            'telephone' => 'required|string|unique:hopitaux,telephone',
            'adresse' => 'required|string',
            'description' => 'nullable|string',
            'type_etablissement' => 'required|in:public,prive,clinique',

            'nom_admin' => 'required|string|max:100',
            'prenom_admin' => 'required|string|max:100',
            'email_admin' => 'required|email|max:255|unique:utilisateurs,email',
            'telephone_admin' => 'required|string|unique:utilisateurs,contact',
            'password' => 'required|confirmed|min:6',
        ], [
            // Messages pour l'hôpital
            'hopital_name.required' => 'Le nom de l\'hôpital est obligatoire.',
            'email.required' => 'L\'email de l\'hôpital est obligatoire.',
            'email.email' => 'L\'email de l\'hôpital n\'est pas valide.',
            'email.unique' => 'Cet email est déjà utilisé pour un autre hôpital.',
            'telephone.required' => 'Le numéro de téléphone de l\'hôpital est obligatoire.',
            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé.',
            'adresse.required' => 'L\'adresse de l\'hôpital est obligatoire.',
            'type_etablissement.required' => 'Le type d\'établissement est obligatoire.',
            'type_etablissement.in' => 'Le type d\'établissement doit être public, privé ou clinique.',

            // Messages pour l'admin
            'nom_admin.required' => 'Le nom de l\'administrateur est obligatoire.',
            'prenom_admin.required' => 'Le prénom de l\'administrateur est obligatoire.',
            'email_admin.required' => 'L\'email de l\'administrateur est obligatoire.',
            'email_admin.email' => 'L\'email de l\'administrateur est invalide.',
            'email_admin.unique' => 'Cet email est déjà associé à un utilisateur.',
            'telephone_admin.required' => 'Le téléphone de l\'administrateur est obligatoire.',
            'telephone_admin.unique' => 'Ce numéro est déjà utilisé par un autre utilisateur.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);


        
        try {
            // 🏥 Création de l'hôpital
            $hopital = new Hopital();
            $hopital->nom = $request->hopital_name;
            $hopital->email = $request->email;
            $hopital->telephone = $request->telephone;
            $hopital->adresse = $request->adresse;
            $hopital->description = $request->description;
            $hopital->type_etablissement = $request->type_etablissement;
            $hopital->statut = 'en attente';
            $hopital->save();

            // 👤 Création de l'admin
            $utilisateur = new User();
            $utilisateur->nom = $request->nom_admin;
            $utilisateur->prenom = $request->prenom_admin;
            $utilisateur->email = $request->email_admin;
            $utilisateur->contact = $request->telephone_admin;
            $utilisateur->adresse = $request->adresse;
            $utilisateur->mot_de_passe = Hash::make($request->password);
            $utilisateur->type_utilisateur = 'admin';
            $utilisateur->statut = 'actif';
            $utilisateur->id_hopital = $hopital->_id;
            $utilisateur->save();

            // 📧 Envoi du mail
            ///Mail::to($hopital->email)->send(new \App\Mail\HopitalInscriptionMail($utilisateur));

            // 🔐 Connexion
            Auth::login($utilisateur);

            return redirect()->route("hopital.dashoard")->with('success', 'Inscription réussie !');
        } catch (Exception $e) {
            Log::error('Erreur lors de l\'inscription de l\'hôpital : ' . $e->getMessage());

            return back()->withInput()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();               // Déconnecte l'utilisateur
        request()->session()->invalidate();  // Invalide la session
        request()->session()->regenerateToken(); // Regénère le token CSRF

        return redirect('/connexion')->with('success', 'Vous êtes bien déconnecté.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Rechercher l'utilisateur
        $user = Utilisateur::where('email', $request->email)->first();

        // Vérifier les informations
        if (!$user || !Hash::check($request->password, $user->mot_de_passe)) {
            return back()->with('error', 'Email ou mot de passe incorrect.');
        }

        // Connexion
        Auth::login($user);

        // Redirection selon le type
        switch ($user->type_utilisateur) {
            case 'admin_hopital':
                return redirect()->route('hopital.dashoard');
            case 'medecin':
                return redirect()->route('medecin.dashboard');
            case 'patient':
                return redirect()->route('patient.dashboard');
            default:
                return redirect('/')->with('error', 'Type d\'utilisateur non reconnu.');
        }
    }
}
