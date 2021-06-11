<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
    }

    public function index(){
        $data = [
            'user' => $this->User->allData(),
        ];
        return view('layout.user', $data);
    }

    public function cari(Request $request){
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'user' => DB::table('users')
                ->where('name', 'like', "%" . $cari . "%")
                ->orWhere('email', 'like', "%" . $cari . "%")
                ->paginate(5),
        ];


        // mengirim data pegawai ke view index
        return view('layout.user', $data);
    }

    public function add(){
        return view('layout.addUser');
    }

    // Simpan Data
    public function simpan(){
        Request()->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'level' => 'required',

        ]);

        $data = [
            'email' => Request()->email,
            'name' => Request()->name,
            'password' => Request()->password,
            'level' => Request()->level,

        ];

        $this->User->addData($data);
        return redirect()->route('user')->with('pesan','Data Berhasil Ditambahkan');
    }
}
