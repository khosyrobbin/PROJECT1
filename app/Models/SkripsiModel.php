<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SkripsiModel extends Model
{
    public function allData(){
        return DB::table('skripsis')
        ->join('mahasiswas', 'mahasiswas.nim', '=', 'skripsis.nim')
        ->paginate(5);
    }

    public function detailData($id_skripsi){
        return DB::table('skripsis')->where('id_skripsi', $id_skripsi)
        ->join('mahasiswas', 'mahasiswas.nim', '=', 'skripsis.nim')
        ->first();
    }

    public function addData($data){
        DB::table('skripsis')->insert($data);
    }

    public function editData($id_skripsi, $data){
        DB::table('skripsis')->where('id_skripsi', $id_skripsi)->update($data);
    }

    public function deleteData($id_skripsi){
        DB::table('skripsis')->where('id_skripsi', $id_skripsi)->delete();
    }

    public function tambah(){
        return DB::table('skripsis')
        ->join('mahasiswas', 'mahasiswas.nim', '=', 'skripsis.nim')
        ->get();
    }
}
