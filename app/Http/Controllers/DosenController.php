<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    // Search data
    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'dosen' => DB::table('dosens')
            ->where('nama_dosen','like',"%".$cari."%")
            ->orWhere('nip','like',"%".$cari."%")
            ->orWhere('jurusan','like',"%".$cari."%")
            ->orWhere('pendidikan','like',"%".$cari."%")
            ->get(),
        ];


        // mengirim data pegawai ke view index
        return view('layout.dosen', $data);
    }

    // edit
    public function edit($nip){
        $data = [
            'dosen' => $this->DosenModel->detailData($nip),
        ];
        return view('layout.editDosen', $data);
    }
    // update
    public function update($nip){
        Request()->validate([
            'nip' => 'required|min:4|max:10',
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

        $this->DosenModel->editData($nip ,$data);
        return redirect()->route('dosen')->with('pesan','Data Berhasil Diperbarui');
    }

    // delete
    public function delete($nip){
        $this->DosenModel->deleteData($nip);
        return redirect()->route('dosen')->with('pesan','Data Berhasil Dihapus');
    }

}
