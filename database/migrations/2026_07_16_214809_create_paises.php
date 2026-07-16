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
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo_iso2', 2)->unique(); // PE, CO, US...
            $table->string('codigo_telefono', 6); // +51, +1, +34...
            $table->unsignedTinyInteger('longitud_min'); // dígitos SIN código de país
            $table->unsignedTinyInteger('longitud_max');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paises');
    }
};
