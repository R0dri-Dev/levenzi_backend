<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $paises = [
            ['nombre' => 'Perú', 'codigo_iso2' => 'PE', 'codigo_telefono' => '+51', 'longitud_min' => 9, 'longitud_max' => 9],
            ['nombre' => 'Ecuador', 'codigo_iso2' => 'EC', 'codigo_telefono' => '+593', 'longitud_min' => 9, 'longitud_max' => 9],
            ['nombre' => 'Colombia', 'codigo_iso2' => 'CO', 'codigo_telefono' => '+57', 'longitud_min' => 10, 'longitud_max' => 10],
            ['nombre' => 'Bolivia', 'codigo_iso2' => 'BO', 'codigo_telefono' => '+591', 'longitud_min' => 8, 'longitud_max' => 8],
            ['nombre' => 'Chile', 'codigo_iso2' => 'CL', 'codigo_telefono' => '+56', 'longitud_min' => 9, 'longitud_max' => 9],
            ['nombre' => 'Argentina', 'codigo_iso2' => 'AR', 'codigo_telefono' => '+54', 'longitud_min' => 10, 'longitud_max' => 11],
            ['nombre' => 'Brasil', 'codigo_iso2' => 'BR', 'codigo_telefono' => '+55', 'longitud_min' => 10, 'longitud_max' => 11],
            ['nombre' => 'Venezuela', 'codigo_iso2' => 'VE', 'codigo_telefono' => '+58', 'longitud_min' => 10, 'longitud_max' => 10],
            ['nombre' => 'México', 'codigo_iso2' => 'MX', 'codigo_telefono' => '+52', 'longitud_min' => 10, 'longitud_max' => 10],
            ['nombre' => 'España', 'codigo_iso2' => 'ES', 'codigo_telefono' => '+34', 'longitud_min' => 9, 'longitud_max' => 9],
            ['nombre' => 'Estados Unidos', 'codigo_iso2' => 'US', 'codigo_telefono' => '+1', 'longitud_min' => 10, 'longitud_max' => 10],
            ['nombre' => 'Italia', 'codigo_iso2' => 'IT', 'codigo_telefono' => '+39', 'longitud_min' => 9, 'longitud_max' => 10],
            ['nombre' => 'Francia', 'codigo_iso2' => 'FR', 'codigo_telefono' => '+33', 'longitud_min' => 9, 'longitud_max' => 9],
            ['nombre' => 'Alemania', 'codigo_iso2' => 'DE', 'codigo_telefono' => '+49', 'longitud_min' => 10, 'longitud_max' => 11],
            ['nombre' => 'China', 'codigo_iso2' => 'CN', 'codigo_telefono' => '+86', 'longitud_min' => 11, 'longitud_max' => 11],
            ['nombre' => 'Japón', 'codigo_iso2' => 'JP', 'codigo_telefono' => '+81', 'longitud_min' => 10, 'longitud_max' => 10],
            ['nombre' => 'Reino Unido', 'codigo_iso2' => 'GB', 'codigo_telefono' => '+44', 'longitud_min' => 10, 'longitud_max' => 10],
            ['nombre' => 'Canadá', 'codigo_iso2' => 'CA', 'codigo_telefono' => '+1', 'longitud_min' => 10, 'longitud_max' => 10],
            ['nombre' => 'Australia', 'codigo_iso2' => 'AU', 'codigo_telefono' => '+61', 'longitud_min' => 9, 'longitud_max' => 9],
            ['nombre' => 'India', 'codigo_iso2' => 'IN', 'codigo_telefono' => '+91', 'longitud_min' => 10, 'longitud_max' => 10],
            ['nombre' => 'Rusia', 'codigo_iso2' => 'RU', 'codigo_telefono' => '+7', 'longitud_min' => 10, 'longitud_max' => 10],
            
        ];

        foreach ($paises as &$pais) {
            $pais['activo'] = true;
            $pais['created_at'] = $now;
            $pais['updated_at'] = $now;
        }

        DB::table('paises')->insert($paises);

        $this->command?->info('Países sembrados: '.count($paises));
    }
}
