<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id')->length(5)->primary();
            $table->string('id_prodi')->length(3);
            $table->string('nama_matakuliah')->length(35);
            $table->string('kategori_matakuliah')->length(20);
            $table->integer('kuota');
            $table->integer('sks');
            $table->integer('semester');
            $table->timestamps();
        });

        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->foreign('id_prodi')->references('id')->on('prodis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliahs');
    }
}
