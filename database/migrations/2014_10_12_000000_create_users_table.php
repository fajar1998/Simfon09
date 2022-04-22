<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('hak_akses')->default(1);
            $table->string('name')->nullable();
            $table->string('nid')->unique();
            $table->string('password');
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenkel')->nullable();
            $table->string('image')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('agama')->nullable();
            $table->date('dob')->nullable();
            $table->date('join_date')->nullable();
            $table->integer('jabatan_id')->nullable();
            $table->string('gaji')->nullable();
            $table->enum('status',['PNS','Honor']);
            $table->integer('kelas_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
