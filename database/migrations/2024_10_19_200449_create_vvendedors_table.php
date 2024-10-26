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
            CREATE VIEW vCompradors AS
            SELECT 
                c.id AS idComprador,  
                p.nombre,
                p.apellido,
                p.edad,
                p.foto,
                c.aniosAntiguedad,
                c.TransaccionesRealizo,
                c.created_at AS comprador_created_at,
                c.updated_at AS comprador_updated_at,
                p.created_at AS persona_created_at,
                p.updated_at AS persona_updated_at
            FROM compradors c
            JOIN personas p ON c.idPersona = p.id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vvendedors');
    }
};
