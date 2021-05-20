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
    // add
    public function add(){
        return view('layout.addJadwal');
    }
    // simpan
    public function simpan(){
        Request()->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'ruangan' => 'required',
        ]);

        //Create
        $data = [
            'hari' => Request()->hari,
            'tanggal' => Request()->tanggal,
            'waktu' => Request()->waktu,
            'ruangan' => Request()->ruangan,
        ];

        $this->JadwalModel->addData($data);
        return redirect()->route('jadwal')->with('pesan','Data Berhasil Ditambahkan');
    }

}
