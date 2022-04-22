<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_nilais', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id')->comment('siswa_id=user_id');
            $table->string('nid')->nullable();
            $table->integer('tahun_id')->nullable();
            $table->integer('kelas_id')->nullable();
            $table->integer('mapel_id')->nullable();
            $table->integer('tipe_ujian_id')->nullable();
            $table->double('nilai')->nullable();
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
        Schema::dropIfExists('entry_nilais');
    }
}
