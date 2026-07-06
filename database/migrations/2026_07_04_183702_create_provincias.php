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
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('departamento_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('codigo',10);

            $table->string('nombre');

            $table->timestamps();

            $table->unique([
                'departamento_id',
                'codigo'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provincias');
    }
};
