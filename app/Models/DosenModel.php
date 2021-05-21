<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DosenModel extends Model
{
    public function allData(){
        return DB::table('dosens')->paginate(3);
    }

    public function addData($data){
        DB::table('dosens')->insert($data);
    }

    public function detailData($nip){
        return DB::table('dosens')->where('nip', $nip)->first();
    }

    public function editData($nip, $data){
        DB::table('dosens')->where('nip', $nip)->update($data);
    }

    public function deleteData($nip){
        DB::table('dosens')->where('nip', $nip)->delete();
    }
}
