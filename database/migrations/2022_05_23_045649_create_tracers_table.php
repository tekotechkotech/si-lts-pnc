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
            $table->string('tracer_id',36)->primary();
            
            $table->foreignUuid('alumni_id');
            $table->foreign('alumni_id')->references('alumni_id')->on('alumnis');

            $table->string('nama_perusahaan',50)->nullable();
            $table->string('id_wilayah_perusahaan',15)->nullable();
            $table->string('provinsi_perusahaan',30)->nullable();
            $table->string('kabupaten_perusahaan', 30)->nullable();
            $table->string('kecamatan_perusahaan', 30)->nullable();
            $table->string('desa_perusahaan', 30)->nullable();
            $table->string('rt_perusahaan', 30)->nullable();
            $table->string('rw_perusahaan', 30)->nullable();
            $table->string('jalan_perusahaan', 30)->nullable();
            $table->string('tahun_masuk', 4)->nullable();
            $table->string('jabatan', 20)->nullable();
            $table->string('gaji_awal', 30)->nullable();
            $table->string('gaji_sekarang', 30)->nullable();
            $table->string('relevansi_kuliah', 30)->nullable();
            $table->string('kursus_setelah_lulus', 255)->nullable();
            $table->string('saran_untuk_kampus', 255)->nullable();

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
        Schema::dropIfExists('tracers', 30);
    }
};
