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
        //
        Schema::create('vinos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');
            $table->year('anio');
            $table->decimal('precio');
            $table->integer('cantidadDisp');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('idVendedor');
            $table->timestamps();

            $table->foreign('idVendedor')->references('id')->on('vendedors')->onDelete('cascade');
        });

        // id_vino 
        // nombre
        // tipo (VARCHAR): Tipo de vino (por ejemplo, tinto, blanco, rosado, espumoso).
        // anio 
        // precio (DECIMAL): Precio del vino, con dos decimales para valores monetarios.
        // stock (INT): 


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
