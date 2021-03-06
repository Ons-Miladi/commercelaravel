<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanierProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panier_products', function (Blueprint $table) {
            $table->id();
            $table->integer('nombre');
            $table->foreignId('idpanier')->constrainted('paniers')->onsUpdate('cascade')->onDelete('cascade');
            $table->foreignId('idproduct')->constrainted('products')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('panier_products');
    }
}
