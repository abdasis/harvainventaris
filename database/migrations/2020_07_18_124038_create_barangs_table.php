<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->longText('diskripsi');
            $table->string('reference', 100)->nullable();
            $table->string('spesifikasi', 100);
            $table->string('kategori', 100);
            $table->string('brand', 100);
            $table->string('supplier', 100);
            $table->string('harga_jual', 100);
            $table->string('harga_beli', 100);
            $table->integer('stok')->nullable();
            $table->string('gambar', 100);
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
        Schema::dropIfExists('barangs');
    }
}
