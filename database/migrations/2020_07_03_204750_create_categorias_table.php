<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 50)->unique();
            $table->string('title', 67);
            $table->string('description', 155);
            $table->string('nombre', 50);
            $table->text('descripcion');
            $table->string('urlfoto', 100)->default('foto.jpg');
            $table->integer('visitas')->default(0);
            $table->integer('orden')->default(0);
            $table->boolean('portada')->default(0);
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
        Schema::dropIfExists('categorias');
    }
}
