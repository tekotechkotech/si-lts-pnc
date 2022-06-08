<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracers', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('alumni_id');
            $table->foreign('alumni_id')->references('id')->on('alumnis');

            $table->string('nama_perusahaan');
            $table->string('id_wilayah_perusahaan');
            $table->string('provini_perusahaan');
            $table->string('kabupaten_perusahaan');
            $table->string('kecamatan_perusahaan');
            $table->string('desa_perusahaan');
            $table->string('rt_perusahaan');
            $table->string('rw_perusahaan');
            $table->string('jalan_perusahaan');
            $table->string('tahun_masuk');
            $table->string('jabatan');
            $table->string('gaji_awal');
            $table->string('gaji_sekarang');
            $table->string('relevansi_kuliah');
            $table->string('kursus_setelah_lulus');
            $table->string('saran_untuk_kampus');
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
        Schema::dropIfExists('tracers');
    }
};
