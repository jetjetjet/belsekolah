<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
          $table->string('kode_kelas');
          $table->bigInteger('wali_kelas');
          $table->string('nama_kelas');
          $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('kelas');
    }
}
