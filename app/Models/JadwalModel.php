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
}
