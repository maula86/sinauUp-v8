<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_b',80)->default('-');
            $table->string('judul',50)->default('-');
            $table->string('penerbit',50)->default('-');
            $table->string('pengarang',50)->default('-');
            $table->string('rak',15)->default('-');
            $table->integer('jml')->default(0);
            $table->decimal('price',10,2);
            $table->string('imgbuku',100)->default('-');
            $table->enum('sts_buku',['ADA','PINJAM','HILANG','RUSAK','MUSNAH',]);
            $table->integer('fo')->default(0);
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
        Schema::dropIfExists('bukus');
    }
}
