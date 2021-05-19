<?php

namespace App\Http\Controllers;

use App\Models\c;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return view('layout.dosen');
    }

}
