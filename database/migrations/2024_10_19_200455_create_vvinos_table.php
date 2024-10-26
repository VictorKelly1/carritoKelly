<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW vVinos AS
            SELECT 
                v.id AS idVino, 
                v.nombre AS nombreVino,
                v.tipo,
                v.anio,
                v.precio,
                v.cantidadDisp,
                v.foto AS fotoVino,
                vv.idVendedor,
                vv.nombre AS nombreVendedor,
                vv.apellido AS apellidoVendedor,
                vv.edad AS edadVendedor,
                vv.foto AS fotoVendedor,
                vv.aniosAntiguedad,
                vv.TransaccionesRealizo,
                v.created_at AS vino_created_at,
                v.updated_at AS vino_updated_at,
                vv.vendedor_created_at,
                vv.vendedor_updated_at
            FROM vinos v
            JOIN vVendedors vv ON v.idVendedor = vv.idVendedor;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vvinos');
    }
};
