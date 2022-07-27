<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('price');
            $table->float('height');
            $table->float('weight');
            $table->string('category');
            $table->string('abilities');
            $table->string('gender');
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('special attack');
            $table->integer('special defense');
            $table->integer('speed');
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
};
