<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
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
        //dd($request->all());
        $validated = $request->validate([
            'user_type' => 'required'
        ]);


        return view("auth.inscription", ['user' => $request]);
    }
}
