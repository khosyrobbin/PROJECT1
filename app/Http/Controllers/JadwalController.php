<?php

namespace App\Http\Controllers;

use App\Models\JadwalModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    // Search data
    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'jadwal' => DB::table('jadwals')
            ->where('hari','like',"%".$cari."%")
            ->orWhere('tanggal','like',"%".$cari."%")
            ->orWhere('waktu','like',"%".$cari."%")
            ->orWhere('ruangan','like',"%".$cari."%")
            ->paginate(5),
        ];


        // mengirim data pegawai ke view index
        return view('layout.jadwal', $data);
    }

    // edit
    public function edit($id_jadwal)
    {
        $data = [
            'jadwal' => $this->JadwalModel->detailData($id_jadwal),
        ];
        return view('layout.editJadwal', $data);
    }
    // update
    public function update($id_jadwal)
    {
        Request()->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'ruangan' => 'required',
        ]);

        $data = [
            'hari' => Request()->hari,
            'tanggal' => Request()->tanggal,
            'waktu' => Request()->waktu,
            'ruangan' => Request()->ruangan,
        ];

        $this->JadwalModel->editData($id_jadwal, $data);
        return redirect()->route('jadwal')->with('pesan', 'Data Berhasil DiPerbarui');
    }

    // delete
    public function delete($id_jadwal){
        $this->JadwalModel->deleteData($id_jadwal);
        return redirect()->route('jadwal')->with('pesan','Data Berhasil Dihapus');
    }

}
