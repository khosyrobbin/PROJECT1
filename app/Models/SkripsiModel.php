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
}
