<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_agt',30)->nullable();
            $table->string('nm_agt',100)->nullable();
            $table->string('alamat_agt',170)->nullable();
            $table->string('hp',15)->nullable();
            $table->string('img_agt',100)->nullable();
            $table->enum('sts_agt',['AKTIV','PASIF','BERHENTI'])->default('AKTIV');
            $table->enum('kondisi',['BELUM','PINJAM','SELESAI'])->default('BELUM');
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
        Schema::dropIfExists('anggotas');
    }
}
