<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $error = "";
        $card = "";
        $password="";
        $disabled='enabled';
        return view('index', compact('error', 'card', 'password', 'disabled'));
    }
}
