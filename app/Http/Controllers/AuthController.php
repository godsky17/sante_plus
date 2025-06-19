<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view("auth.inscription", ['user_type' => $request->user_type]);
    }
}
