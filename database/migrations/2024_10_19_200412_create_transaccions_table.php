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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idComprador');
            $table->unsignedBigInteger('idVino');
            $table->integer('Cantidad');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('idVendedor');
            $table->timestamps();

            $table->foreign('idComprador')->references('id')->on('compradors')->onDelete('cascade');
            $table->foreign('idVino')->references('id')->on('vinos')->onDelete('cascade');
            $table->foreign('idVendedor')->references('id')->on('vendedors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccions');
    }
};
