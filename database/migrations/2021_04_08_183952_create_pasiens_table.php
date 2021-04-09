<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            // $table->increments('id');
            $table->string('nama_pasien');
            $table->unsignedBigInteger('id_rumahsakit');
            $table->string('email');
            $table->string('alamat');
            $table->string('telepon');
            $table->timestamps();

            $table->foreign('id_rumahsakit')->constrained()->references('id')->on('rumah_sakits')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
