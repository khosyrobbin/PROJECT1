<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiSkripsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skripsis', function (Blueprint $table) {
            $table->string('nim')->nullable();
            $table->foreign('nim')->references('nim')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skripsis', function (Blueprint $table) {
            $table->string('mahasiswas');
            $table->dropForeign(['nim']);
        });
    }
}
