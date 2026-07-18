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
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id();

            $table->decimal('latitud', 10, 7);
            $table->decimal('longitud', 10, 7);

            // Relación polimórfica: a qué modelo pertenece (Sede, Cliente, Instalacion, etc.)
            $table->morphs('ubicable'); // crea ubicable_id, ubicable_type + index

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicaciones');
    }
};
