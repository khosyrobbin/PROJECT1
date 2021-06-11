<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index(){
        return view('layout.tanggapan');
    }
}
