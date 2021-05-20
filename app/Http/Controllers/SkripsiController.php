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

    // Detail Data
    public function detail($id_skripsi){
        $data = [
            'skripsi' => $this->SkripsiModel->detailData($id_skripsi),
        ];
        return view('layout.detailSkripsi', $data);
    }

    // add
    public function add(){
       return view('layout.addSkripsi');
    }
    // simpan
    public function simpan(){
        Request()->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'file' => 'required|mimes:pdf|max:1024',
        ]);

        //upload gambar
        $file = Request()->file;
        $fileName = Request()->judul.'.'.$file->extension();
        $file->move(public_path('file_skripsi'), $fileName);

        $data = [
            'judul' => Request()->judul,
            'abstrak' => Request()->abstrak,
            'file' => $fileName,
        ];

        $this->SkripsiModel->addData($data);
        return redirect()->route('skripsi')->with('pesan','Data Berhasil Ditambahkan');
    }
}
