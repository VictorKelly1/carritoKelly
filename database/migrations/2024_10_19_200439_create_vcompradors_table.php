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
            CREATE VIEW vVendedors AS
            SELECT 
                v.id AS idVendedor,  
                p.nombre,
                p.apellido,
                p.edad,
                p.foto,
                v.aniosAntiguedad,
                v.TransaccionesRealizo,
                v.created_at AS vendedor_created_at,
                v.updated_at AS vendedor_updated_at,
                p.created_at AS persona_created_at,
                p.updated_at AS persona_updated_at
            FROM vendedors v
            JOIN personas p ON v.idPersona = p.id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vcompradors');
    }
};
