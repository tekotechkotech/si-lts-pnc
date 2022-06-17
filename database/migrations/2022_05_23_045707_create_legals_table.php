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
            $table->increments('legal_id');

            $table->unsignedBigInteger('alumni_id');
            $table->foreign('alumni_id')->references('alumni_id')->on('alumnis');

            $table->string('upload_berkas')->nullable();
            $table->string('jenis_berkas');
            $table->string('level_acc')->default('0');
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
