<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControleurEnseignant extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index(){
        return view('enseignants');
    }
}
