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
        Schema::create('tipos_documento', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->unique(); // DNI, RUC, CE, PAS, PTP...
            $table->string('nombre'); // Documento Nacional de Identidad, Registro Único de Contribuyentes, ETC
            $table->unsignedTinyInteger('longitud')->nullable(); // 8, 11, etc. (validación)
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_documento');
    }
};
