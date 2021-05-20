<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BimbinganModel extends Model
{
    public function allData(){
        return DB::table('bimbingans')->get();
    }
}
