<?php

namespace App\Http\Controllers;

use App\Models\BimbinganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BimbinganController extends Controller
{
    public function __construct()
    {
        $this->BimbinganModel = new BimbinganModel();
    }
    public function index()
    {
        $data = [
            'bimbingan' => $this->BimbinganModel->allData(),
        ];
        return view('layout.bimbingan', $data);
    }

    // add
    public function add()
    {
        return view('layout.addBimbingan');
    }
    // simpan
    public function simpan()
    {
        Request()->validate([
            'nip' => 'required',
            'nim' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        //create
        $data = [
            'nip' => Request()->nip,
            'nim' => Request()->nim,
            'tanggal' => Request()->tanggal,
            'keterangan' => Request()->keterangan,
        ];

        $this->BimbinganModel->addData($data);
        return redirect()->route('bimbingan')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    // Search data
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'bimbingan' => DB::table('bimbingans')
                ->join('dosens', 'dosens.nip', '=', 'bimbingans.nip')
                ->join('mahasiswas', 'mahasiswas.nim', '=', 'bimbingans.nim')
                ->orWhere('nama', 'like', "%" . $cari . "%")
                ->orWhere('nama_dosen', 'like', "%" . $cari . "%")
                ->get(),
        ];


        // mengirim data pegawai ke view index
        return view('layout.bimbingan', $data);
    }

    // edit
    public function edit($id_bimbingan)
    {
        $data = [
            'bimbingan' => $this->BimbinganModel->detailData($id_bimbingan),
        ];
        return view('layout.editBimbingan', $data);
    }

    public function update($id_bimbingan)
    {
        Request()->validate([
            'nip' => 'required',
            'nim' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        //create
        $data = [
            'nip' => Request()->nip,
            'nim' => Request()->nim,
            'tanggal' => Request()->tanggal,
            'keterangan' => Request()->keterangan,
        ];

        $this->BimbinganModel->editData($id_bimbingan, $data);
        return redirect()->route('bimbingan')->with('pesan', 'Data Berhasil Diperbarui');
    }

    // delete
    public function delete($id_bimbingan){
        $this->BimbinganModel->deleteData($id_bimbingan);
        return redirect()->route('bimbingan')->with('pesan','Data Berhasil Dihapus');
    }
}
