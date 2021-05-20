<?php

namespace App\Http\Controllers;

use App\Models\SkripsiModel;
use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function __construct()
    {
        $this->SkripsiModel = new SkripsiModel();
    }

    public function index(){
        $data = [
            'skripsi' => $this->SkripsiModel->allData(),
        ];
        return view('layout.skripsi', $data);
    }
}
