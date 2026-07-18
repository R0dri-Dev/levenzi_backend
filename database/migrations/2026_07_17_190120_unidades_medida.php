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
        Schema::create('unidades_medida', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tipo_unidad_medida_id')
                ->constrained('tipos_unidad_medida')
                ->restrictOnDelete();

            $table->string('nombre');   // Kilogramo, Gramo...
            $table->string('simbolo');  // kg, g...

            // Equivalencia contra la unidad base de su tipo (ej: 1 kg = 1000 g -> factor_base de "gramo" = 1000)
            $table->decimal('factor_base', 20, 10);

            $table->boolean('base')->default(false);       // ¿es la unidad base de su tipo? (factor_base = 1)
            $table->boolean('conversion')->default(true);   // ¿permite conversión?
            $table->boolean('activo')->default(true);

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();

            $table->unique(['tipo_unidad_medida_id', 'simbolo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidades_medida');
    }
};
