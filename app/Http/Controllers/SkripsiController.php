<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function index(){
        return view('layout.skripsi');
    }
}
