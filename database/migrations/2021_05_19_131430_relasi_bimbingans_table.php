<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bimbingans', function (Blueprint $table) {
            $table->string('nip')->nullable();
            $table->foreign('nip')->references('nip')->on('dosens');

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
        Schema::table('bimbingans', function (Blueprint $table) {
            $table->string('dosens');
            $table->string('mahasiswas');
            $table->dropForeign(['nip']);
            $table->dropForeign(['nim']);
        });
    }
}
