<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{

    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 50)->unique();
            $table->string('title', 67);
            $table->string('description', 155);
            $table->string('nombre', 50)->unique();
            $table->text('descripcion');
            $table->decimal('precio', 7, 2);
            $table->string('unidad', 15);
            $table->integer('stock');

            $table->string('urlfoto', 100)->default('foto.jpg');
            $table->integer('visitas')->default(0);
            $table->integer('orden')->default(0);
            $table->boolean('estado')->default(0);

            $table->unsignedBigInteger('subcategorias_id');
            $table->foreign('subcategorias_id', 'fk_productos_subcategorias')->references('id')->on('subcategorias')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('productos');
    }
}
