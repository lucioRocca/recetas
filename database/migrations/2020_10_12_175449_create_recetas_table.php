<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('categoria_recetas', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');
        });

        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('ingredientes')->require;
            $table->text('preparacion')->require;
            $table->string('imagen')->require;
            $table->timestamps();
            $table->foreignId('categoria_id')->references('id')->on('categoria_recetas');
            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas');
        Schema::dropIfExists('categoria_recetas');

    }
}
