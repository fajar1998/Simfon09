<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiMinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_mins', function (Blueprint $table) {
            $table->id();
            $table->integer('kelas_id');
            $table->integer('mapel_id');
            $table->double('full_mark');
            $table->double('pass_mark');
            $table->double('subjektif_mark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_mins');
    }
}
