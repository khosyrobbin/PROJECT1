<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->DosenModel = new DosenModel();
    }

    public function index()
    {
        $data = [
            'dosen' => $this->DosenModel->allData(),
        ];
        return view('layout.dosen', $data);
    }

}
