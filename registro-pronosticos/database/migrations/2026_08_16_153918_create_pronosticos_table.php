<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pronosticos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');       // Quien creó el pronóstico
            $table->unsignedBigInteger('familia_id');    // Familia seleccionada
            $table->unsignedBigInteger('producto_id');   // Producto específico

            $table->integer('ene');
            $table->integer('feb');
            $table->integer('mar');
            $table->integer('abr');
            $table->integer('may');
            $table->integer('jun');
            $table->integer('jul');
            $table->integer('ago');
            $table->integer('sep');
            $table->integer('oct');
            $table->integer('nov');
            $table->integer('dic');

            // 🔗 Definir las relaciones
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('familia_id')
                ->references('id')
                ->on('familias')
                ->onDelete('cascade');

            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pronosticos');
    }
};
