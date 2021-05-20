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

    public function add(){
        return view('layout.addDosen');
    }

    // Add Data
    public function simpan(){
        Request()->validate([
            'nip' => 'required|unique:dosens,nip|min:4|max:10',
            'nama_dosen' => 'required',
            'jurusan' => 'required',
            'no_telpon' => 'required',
            'pendidikan' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:1024',
        ]);

        //upload gambar
        $file = Request()->foto;
        $fileName = Request()->nip.'.'.$file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_dosen' => Request()->nama_dosen,
            'jurusan' => Request()->jurusan,
            'no_telpon' => Request()->no_telpon,
            'pendidikan' => Request()->pendidikan,
            'foto' => $fileName,
        ];

        $this->DosenModel->addData($data);
        return redirect()->route('dosen')->with('pesan','Data Berhasil Ditambahkan');
    }

}
