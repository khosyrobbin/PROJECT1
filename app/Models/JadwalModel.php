<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JadwalModel extends Model
{
    public function allData(){
        return DB::table('jadwals')->paginate(5);
    }

    public function addData($data){
        DB::table('jadwals')->insert($data);
    }

    public function detailData($id_jadwal){
        return DB::table('jadwals')->where('id_jadwal', $id_jadwal)->first();
    }

    public function editData($id_jadwal, $data){
        DB::table('jadwals')->where('id_jadwal', $id_jadwal)->update($data);
    }

    public function deleteData($id_jadwal){
        DB::table('jadwals')->where('id_jadwal', $id_jadwal)->delete();
    }
}
