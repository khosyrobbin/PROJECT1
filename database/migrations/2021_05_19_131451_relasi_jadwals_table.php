<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
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
        Schema::table('jadwals', function (Blueprint $table) {
            $table->string('bimbingans');
            $table->dropForeign(['id_bimbingan']);
        });
    }
}
