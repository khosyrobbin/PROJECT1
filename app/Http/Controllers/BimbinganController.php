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

    // add
    public function add(){
        return view('layout.addBimbingan');
    }
    // simpan
    public function simpan(){
        Request()->validate([
            'nip' => 'required|unique:dosens,nip|min:4|max:10',
            'nim' => 'required|unique:mahasiswas,nim|min:9|max:11',
            'nama' => 'required|unique:mahasiswas,nama',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        //create
        $data = [
            'nip' => Request()->nip,
            'nim' => Request()->nim,
            'nama' => Request()->nama,
            'tanggal' => Request()->tanggal,
            'keterangan' => Request()->keterangan,
        ];

        $this->BimbinganModel->addData($data);
        return redirect()->route('bimbingan')->with('pesan','Data Berhasil Ditambahkan');
    }
}
