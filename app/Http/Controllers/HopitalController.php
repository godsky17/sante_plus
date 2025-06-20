<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Hopital;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class HopitalController extends Controller
{
    public function dashboard()
    {
        return view("admin.hopital.index");
    }


    public function medecins()
    {
        $medecins = User::getMedecinsEnAttente();
        return view('admin.hopital.medecins', ['medecins' => $medecins]);
    }
}
