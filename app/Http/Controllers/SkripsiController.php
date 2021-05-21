<?php

namespace App\Http\Controllers;

use App\Models\SkripsiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkripsiController extends Controller
{
    public function __construct()
    {
        $this->SkripsiModel = new SkripsiModel();
    }

    public function index()
    {
        $data = [
            'skripsi' => $this->SkripsiModel->allData(),
        ];
        return view('layout.skripsi', $data);
    }

    // Detail Data
    public function detail($id_skripsi)
    {
        $data = [
            'skripsi' => $this->SkripsiModel->detailData($id_skripsi),
        ];
        return view('layout.detailSkripsi', $data);
    }

    // add
    public function add()
    {
        return view('layout.addSkripsi');
    }
    // simpan
    public function simpan()
    {
        Request()->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'file' => 'required|mimes:pdf|max:1024',
        ]);

        //upload gambar
        $file = Request()->file;
        $fileName = Request()->judul . '.' . $file->extension();
        $file->move(public_path('file_skripsi'), $fileName);

        $data = [
            'judul' => Request()->judul,
            'abstrak' => Request()->abstrak,
            'file' => $fileName,
        ];

        $this->SkripsiModel->addData($data);
        return redirect()->route('skripsi')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    // Search data
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'skripsi' => DB::table('skripsis')
                ->where('judul', 'like', "%" . $cari . "%")
                ->orWhere('abstrak', 'like', "%" . $cari . "%")
                ->orWhere('file', 'like', "%" . $cari . "%")
                ->get(),
        ];


        // mengirim data pegawai ke view index
        return view('layout.skripsi', $data);
    }

    // edit
    public function edit($id_skripsi)
    {
        $data = [
            'skripsi' => $this->SkripsiModel->detailData($id_skripsi),
        ];
        return view('layout.editSkripsi', $data);
    }
    // update
    public function update($id_skripsi)
    {
        Request()->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'file' => 'required|mimes:pdf|max:1024',
        ]);

        //upload gambar
        $file = Request()->file;
        $fileName = Request()->judul . '.' . $file->extension();
        $file->move(public_path('file_skripsi'), $fileName);

        $data = [
            'judul' => Request()->judul,
            'abstrak' => Request()->abstrak,
            'file' => $fileName,
        ];

        $this->SkripsiModel->editData($id_skripsi, $data);
        return redirect()->route('skripsi')->with('pesan', 'Data Berhasil DiPerbarui');
    }

    // delete
    public function delete($id_skripsi){
        $this->SkripsiModel->deleteData($id_skripsi);
        return redirect()->route('skripsi')->with('pesan','Data Berhasil Dihapus');
    }
}
