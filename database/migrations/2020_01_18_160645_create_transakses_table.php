<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transakses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kdtrans',50)->nullable();
            $table->date('tglpjm');
            $table->bigInteger('user_id')->unsigned()->index();// Foreign key Tabel User
            $table->bigInteger('agt_id')->unsigned()->index();// Foreign key Tabel Anggota
            $table->date('tglkmb');
            $table->enum('sts_trans',['PINJAM','SELESAI'])->default('PINJAM');
            $table->timestamps();


            // Relasi 
            // *Tabel user(one)->to tabel transaksis(many)*
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            // Relasi
            // *Tabel anggotas(one)-> to tabel transaksis(many)*
            $table->foreign('agt_id')
            ->references('id')
            ->on('anggotas')
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
        Schema::dropIfExists('transakses');
    }
}
