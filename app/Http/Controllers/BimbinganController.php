<?php

namespace App\Http\Controllers;

use App\Models\BimbinganModel;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function __construct()
    {
        $this->BimbinganModel = new BimbinganModel();
    }
    public function index(){
        $data = [
            'bimbingan' => $this->BimbinganModel->allData(),
        ];
        return view('layout.bimbingan', $data);
    }
}
