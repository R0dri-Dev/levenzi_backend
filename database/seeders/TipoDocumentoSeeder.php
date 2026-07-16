<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('tipos_documento')->insert([
            ['codigo' => 'DNI', 'nombre' => 'Documento Nacional de Identidad', 'longitud' => 8, 'activo' => true, 'created_at' => $now, 'updated_at' => $now],
            ['codigo' => 'RUC', 'nombre' => 'Registro Único de Contribuyentes', 'longitud' => 11, 'activo' => true, 'created_at' => $now, 'updated_at' => $now],
            ['codigo' => 'CE', 'nombre' => 'Carné de Extranjería', 'longitud' => 9, 'activo' => true, 'created_at' => $now, 'updated_at' => $now],
            ['codigo' => 'PAS', 'nombre' => 'Pasaporte', 'longitud' => null, 'activo' => true, 'created_at' => $now, 'updated_at' => $now],
            ['codigo' => 'PTP', 'nombre' => 'Permiso Temporal de Permanencia', 'longitud' => null, 'activo' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);

        $this->command?->info('Tipos de documento sembrados: 5');
    }
}
