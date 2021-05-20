<?php

namespace App\Http\Controllers;

use App\Models\JadwalModel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->JadwalModel = new JadwalModel();
    }
    public function index(){
        $data = [
            'jadwal' => $this->JadwalModel->allData(),
        ];
        return view('layout.jadwal', $data);
    }
}
