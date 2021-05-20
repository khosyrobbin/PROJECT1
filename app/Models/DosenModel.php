<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DosenModel extends Model
{
    public function allData(){
        return DB::table('dosens')->get();
    }

    public function addData($data){
        DB::table('dosens')->insert($data);
    }
}
