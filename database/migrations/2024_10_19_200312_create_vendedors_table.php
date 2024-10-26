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
        Schema::create('vendedors', function (Blueprint $table) {
            $table->id();
            $table->integer('AniosAntiguedad');
            $table->integer('TransaccionesRealizo');
            $table->unsignedBigInteger('idPersona');
            $table->unsignedBigInteger('idUsuario');
            $table->timestamps();

            $table->foreign('idPersona')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('idUsuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedors');
    }
};
