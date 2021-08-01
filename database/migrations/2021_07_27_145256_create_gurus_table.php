<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id('kode_guru')->unique();
            $table->string('kode_mapel');
            $table->bigInteger('photo_id')->nullable();
            $table->string('nama_lengkap');
            $table->integer('nuptk')->unique();
            $table->string('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->bigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
