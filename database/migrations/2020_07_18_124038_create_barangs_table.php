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
            $table->string('nama_produk', 100);
            $table->longText('diskripsi_barang');
            $table->string('kategori_barang', 100);
            $table->string('harga_beli', 100);
            $table->string('harga_jual', 100);
            $table->string('status_barang', 100);
            $table->string('stok_barang', 100);
            $table->string('gambar_barang', 100);
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
