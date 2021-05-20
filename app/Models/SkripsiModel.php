<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SkripsiModel extends Model
{
    public function allData(){
        return DB::table('skripsis')->get();
    }

    public function detailData($id_skripsi){
        return DB::table('skripsis')->where('id_skripsi',$id_skripsi)->first();
    }
}
