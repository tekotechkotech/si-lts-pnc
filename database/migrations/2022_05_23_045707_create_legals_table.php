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
        Schema::create('legals', function (Blueprint $table) {
            $table->string('legal_id',36)->primary();

            $table->foreignUuid('alumni_id');
            $table->foreign('alumni_id')->references('alumni_id')->on('alumnis');

            $table->string('upload_berkas',100)->nullable();
            $table->string('jenis_berkas',30)->nullable();
            $table->integer('level_acc',1)->default('0');
            $table->string('file_legal',100)->nullable();
            $table->date('berlaku_sampai',10)->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('legals');
    }
};
