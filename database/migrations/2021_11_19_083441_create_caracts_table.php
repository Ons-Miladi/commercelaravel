<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracts', function (Blueprint $table) {
            $table->id();
            $table->string('taille');
            $table->string('couleur');
            $table->integer('quantite');
            $table->foreignId('idproduct')->constrainted('products')->OnUpdate('cascade')->OnDelete('cascade');
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
        Schema::dropIfExists('caracts');
    }
}
