<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }
    public function index(){
        $data = [
            'mahasiswa' => $this->MahasiswaModel->allData(),
        ];
        return view('layout.mahasiswa', $data);
    }
    // Add data
    public function add(){
        return view('layout.addMahasiswa');
    }
    // Simpan Data
    public function simpan(){
        Request()->validate([
            'nim' => 'required|unique:mahasiswas,nim|min:8|max:11',
            'nama' => 'required',
            'jurusan' => 'required',
            'no_telpon' => 'required',
            'angkatan' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:1024',
        ]);

        //upload gambar
        $file = Request()->foto;
        $fileName = Request()->nim.'.'.$file->extension();
        $file->move(public_path('foto_mhs'), $fileName);

        $data = [
            'nim' => Request()->nim,
            'nama' => Request()->nama,
            'jurusan' => Request()->jurusan,
            'no_telpon' => Request()->no_telpon,
            'angkatan' => Request()->angkatan,
            'foto' => $fileName,
        ];

        $this->MahasiswaModel->addData($data);
        return redirect()->route('mahasiswa')->with('pesan','Data Berhasil Ditambahkan');
    }

    // Search data
    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'mahasiswa' => DB::table('mahasiswas')
            ->where('nama','like',"%".$cari."%")
            ->orWhere('nim','like',"%".$cari."%")
            ->orWhere('jurusan','like',"%".$cari."%")
            ->orWhere('no_telpon','like',"%".$cari."%")
            ->get(),
        ];


        // mengirim data pegawai ke view index
        return view('layout.mahasiswa', $data);
    }

    // edit
    public function edit($nim){
        $data = [
            'mahasiswa' => $this->MahasiswaModel->detailData($nim),
        ];
        return view('layout.editMahasiswa', $data);
    }
    // update
    public function update($nim){
        Request()->validate([
            'nim' => 'required|min:9|max:11',
            'nama' => 'required',
            'jurusan' => 'required',
            'no_telpon' => 'required',
            'angkatan' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:1024',
        ]);

        //upload gambar
        $file = Request()->foto;
        $fileName = Request()->nim.'.'.$file->extension();
        $file->move(public_path('foto_mhs'), $fileName);

        $data = [
            'nim' => Request()->nim,
            'nama' => Request()->nama,
            'jurusan' => Request()->jurusan,
            'no_telpon' => Request()->no_telpon,
            'angkatan' => Request()->angkatan,
            'foto' => $fileName,
        ];

        $this->MahasiswaModel->editData($nim ,$data);
        return redirect()->route('mahasiswa')->with('pesan','Data Berhasil Diperbarui');
    }
}
