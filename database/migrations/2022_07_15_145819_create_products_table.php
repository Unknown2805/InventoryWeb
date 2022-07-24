<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('suppliers');
            $table->string('barang');
            $table->integer('qty_m')->nullable();
            $table->integer('qty_k')->nullable();
            $table->integer('qty_r')->nullable();            
            $table->integer('masuk')->nullable();
            $table->integer('keluar')->nullable();
            $table->integer('transport')->nullable();
            $table->string('jenis');
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
        Schema::dropIfExists('products');
    }
}
