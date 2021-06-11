<?php

namespace App\Models;

// use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BimbinganModel extends Model
{
    // protected $table = 'bimbingans';
    // public $incrementing = false;
    // protected $primariKey = 'id_bimbingan';
    // protected $cast = [
    //     'id_bimbingan' => 'BigInteger',
    // ];

    public function allData()
    {
        return DB::table('bimbingans')
            ->join('dosens', 'dosens.nip', '=', 'bimbingans.nip')
            ->join('mahasiswas', 'mahasiswas.nim', '=', 'bimbingans.nim')
            ->paginate(5);
    }

    public function addData($data)
    {
        DB::table('bimbingans')->insert($data);
    }

    public function detailData($id_bimbingan)
    {
        return DB::table('bimbingans')->where('id_bimbingan', $id_bimbingan)->first();
    }

    public function editData($id_bimbingan, $data)
    {
        DB::table('bimbingans')->where('id_bimbingan', $id_bimbingan)->update($data);
    }

    public function deleteData($id_bimbingan){
        DB::table('bimbingans')->where('id_bimbingan', $id_bimbingan)->delete();
    }

    public function tambah(){
        return DB::table('bimbingans')
            ->join('dosens', 'dosens.nip', '=', 'bimbingans.nip')
            ->join('mahasiswas', 'mahasiswas.nim', '=', 'bimbingans.nim')
            ->get();
    }
}
