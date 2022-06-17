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
            $table->increments('tracer_id');
            
            $table->unsignedBigInteger('alumni_id');
            $table->foreign('alumni_id')->references('alumni_id')->on('alumnis');

            $table->string('nama_perusahaan')->nullable();
            $table->string('id_wilayah_perusahaan')->nullable();
            $table->string('provinsi_perusahaan')->nullable();
            $table->string('kabupaten_perusahaan')->nullable();
            $table->string('kecamatan_perusahaan')->nullable();
            $table->string('desa_perusahaan')->nullable();
            $table->string('rt_perusahaan')->nullable();
            $table->string('rw_perusahaan')->nullable();
            $table->string('jalan_perusahaan')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('gaji_awal')->nullable();
            $table->string('gaji_sekarang')->nullable();
            $table->string('relevansi_kuliah')->nullable();
            $table->string('kursus_setelah_lulus')->nullable();
            $table->string('saran_untuk_kampus')->nullable();
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
