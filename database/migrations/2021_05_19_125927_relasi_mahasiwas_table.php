<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiMahasiwasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->string('nip')->nullable();
            $table->foreign('nip')->references('nip')->on('dosens');

            $table->unsignedBigInteger('id_bimbingan')->nullable();
            $table->foreign('id_bimbingan')->references('id_bimbingan')->on('bimbingans');
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->string('dosens');
            $table->string('bimbingans');
            $table->dropForeign(['nip']);
            $table->dropForeign(['id_bimbingan']);
        });    }
}
