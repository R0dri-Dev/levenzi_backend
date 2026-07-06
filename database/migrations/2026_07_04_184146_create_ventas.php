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
       Schema::create('ventas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('sede_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('cliente_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('doctor_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('user_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('direccion');

            $table->string('referencia')->nullable();

            $table->text('observaciones')->nullable();

            $table->timestamps();

            $table->index('cliente_id');
            $table->index('doctor_id');
            $table->index('user_id');
            $table->index('sede_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
