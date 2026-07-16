<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sede_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('distrito_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('tipo_documento_id')
                ->nullable()
                ->constrained('tipos_documento')
                ->nullOnDelete();

            $table->foreignId('pais_id')
                ->nullable()
                ->after('tipo_documento_id')
                ->constrained('paises')
                ->nullOnDelete();

            $table->string('documento_numero', 20)->nullable();

            $table->string('nombre');

            $table->string('direccion');

            $table->string('telefono', 20)->nullable();

            $table->string('email')->nullable();

            $table->boolean('activo')->default(true);

            $table->timestamps();

            $table->unique(['tipo_documento_id', 'documento_numero']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
