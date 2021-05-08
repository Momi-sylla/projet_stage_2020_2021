<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class ControlleurUser extends Controller
{
    public function index(){
        $userlists = User::all();


        return view('VueUser',compact('userlists'));
    }
}
