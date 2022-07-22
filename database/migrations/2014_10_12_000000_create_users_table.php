<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('foto',50)->default('foto.jpg');
            $table->enum('role', ['alumni', 'admin']);
            $table->string('name', 50)->nullable();
            $table->string('username',18)->nullable();
            $table->string('tempat_lahir',35)->nullable();
            $table->date('tanggal_lahir',10)->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('id_wilayah',15)->nullable();
            $table->string('provinsi',30)->nullable();
            $table->string('kabupaten',30)->nullable();
            $table->string('kecamatan',30)->nullable();
            $table->string('desa',30)->nullable();
            $table->string('rt',2)->nullable();
            $table->string('rw',2)->nullable();
            $table->string('jalan',20)->nullable();
            $table->string('no_hp',15)->nullable();
            $table->string('email',30)->unique();
            $table->timestamp('email_verified_at',)->nullable();
            $table->string('password',76);
            $table->boolean('status',1)->default(1);
            $table->rememberToken();
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
};
