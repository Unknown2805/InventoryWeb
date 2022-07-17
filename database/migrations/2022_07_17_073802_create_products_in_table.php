<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_in', function (Blueprint $table) {
            $table->id();
            $table->string('suppliers')->nullable();
            $table->string('barang')->nullable();
            $table->integer('qty');
            $table->integer('in')->nullable();
            $table->integer('out')->nullable();
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
        Schema::dropIfExists('products_in');
    }
}
