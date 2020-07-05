<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->unique();
            $table->decimal('subtotal', 7, 2);
            $table->decimal('impuesto', 7, 2);
            $table->decimal('total', 7, 2);
            $table->boolean('estado')->default(0); //0 no entregado //1 entregado

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_pedidos_usuarios')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('pedidos');
    }
}
