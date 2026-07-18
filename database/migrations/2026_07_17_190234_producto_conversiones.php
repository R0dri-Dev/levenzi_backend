<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producto_conversiones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('producto_id')
                ->constrained('productos')
                ->cascadeOnDelete();

            $table->foreignId('unidad_medida_origen_id')
                ->constrained('unidades_medida')
                ->restrictOnDelete();

            $table->foreignId('unidad_medida_destino_id')
                ->constrained('unidades_medida')
                ->restrictOnDelete();

            $table->decimal('factor_conversion', 20, 10);

            $table->boolean('activo')->default(true);

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();

            $table->unique(
                ['producto_id', 'unidad_medida_origen_id', 'unidad_medida_destino_id'],
                'producto_conversiones_unicidad'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producto_conversiones');
    }
};
