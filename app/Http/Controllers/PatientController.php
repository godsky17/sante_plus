<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    /**
     * Afficher le formulaire d'inscription
     */
    public function showRegistrationForm()
    {
        return view('auth.inscription'); // Votre vue d'inscription
    }

    /**
     * Traiter l'inscription d'un nouveau patient
     */
   /** */ 
    public function register(Request $request)
    {
        
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|string|max:20|unique:users,telephone',
            'password' => 'required|string|min:8|confirmed',
            'conditions' => 'required|accepted',
        ], [
            // Messages d'erreur personnalisés en français
            'nom.required' => 'Le nom est obligatoire.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'conditions.required' => 'Vous devez accepter les conditions et politiques de confidentialité.',
            'conditions.accepted' => 'Vous devez accepter les conditions et politiques de confidentialité.',
        ]);
      
        // Si la validation échoue
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }
        
        try {
            // Créer le nouvel utilisateur/patient
            $patient = new Patient();
            $patient->nom = $request->nom;
            $patient->prenom = $request->prenom;
            $patient->email = $request->email;
            $patient->telephone = $request->telephone;
            $patient->password = Hash::make($request->password);
            $patient->role = 'patient';
            $patient->email_verified_at = null;

            $patient->save();

            // Connexion automatique après inscription (optionnel)
            Auth::login($patient);

            // Redirection avec message de succès
            return redirect()->route('accueil') // ou la route de votre choix
                ->with('success', 'Inscription réussie ! Bienvenue sur Santé Plus.');

        } catch (\Exception $e) {
            // En cas d'erreur lors de la création
            Log::error('Erreur lors de l’inscription : ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.')
                ->withInput($request->except('password', 'password_confirmation'));
        }
    }

    /**
     * Afficher le formulaire de connexion
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Votre vue de connexion
    }

    /**
     * Traiter la connexion d'un patient
     * (À implémenter dans la prochaine étape)
     */
   public function login(Request $request)
    {
        // Validation des données de connexion
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        // Si la validation échoue
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Tentative de connexion
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Option "Se souvenir de moi"
        $remember = $request->has('remember');

        // Tentative d'authentification
        if (Auth::attempt($credentials, $remember)) {
            // Régénérer la session pour éviter la fixation de session
            $request->session()->regenerate();

            // Récupérer le patient connecté
            $patient = Auth::user();

            // Redirection avec message de succès
            return redirect()->intended(route('accueil')) // ou votre route par défaut
                ->with('success', 'Bienvenue ' . $patient->prenom . ' !');
        }

        // En cas d'échec de connexion
        return redirect()->back()
            ->withErrors([
                'email' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
            ])
            ->withInput($request->except('password'));
    }


    /**
     * Déconnecter le patient
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('accueil')
            ->with('success', 'Vous avez été déconnecté avec succès.');
    }
}