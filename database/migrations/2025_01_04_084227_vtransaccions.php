<?php

use Illuminate\Support\Facades\DB;
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
        DB::statement("
            CREATE VIEW vTransaccions AS
            SELECT 
                transaccions.id AS idTransaccion,  
                vcompradors.nombre AS nombreComprador,
                vcompradors.apellido AS apellidoComprador,
                vinos.nombre AS nombreVino,
                transaccions.Cantidad,
                transaccions.fecha,
                transaccions.estado,
                vvendedors.nombre AS nombreVendedor,
                vvendedors.apellido AS apellidoVendedor,
                transaccions.idVendedor AS idVendedor,  
                transaccions.idComprador AS idComprador  
            FROM 
                transaccions
            JOIN 
                vcompradors ON transaccions.idComprador = vcompradors.idComprador
            JOIN 
                vinos ON transaccions.idVino = vinos.id
            JOIN 
                vvendedors ON transaccions.idVendedor = vvendedors.idVendedor;

        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtransaccions');
    }
};
