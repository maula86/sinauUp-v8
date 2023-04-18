<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('trans_id')->unsigned()->index();// Foreign key Tabel Transaksi
            $table->bigInteger('buku_id')->unsigned()->index();// Foreign key Tabel Buku
            $table->date('tgl_kembali');
            $table->enum('kondetails',['-','TEPAT','TELAT'])->default('-');
            $table->enum('sts_details',['BELUM','KEMBALI','HILANG'])->default('BELUM');
            $table->double('denda_tlt',24,2)->default(0);
            $table->double('denda_hlng',24,2)->default(0);
            $table->double('denda_rsk',24,2)->default(0);


            $table->timestamps();

            // Relasi
            // *Tabel Transakses(many)->to tabel details(many)*
            $table->foreign('trans_id')
            ->references('id')
            ->on('transakses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            // Relasi
            // *Tabel bukus(one)->to tabel details(many)*
            $table->foreign('buku_id')
            ->references('id')
            ->on('bukus')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
