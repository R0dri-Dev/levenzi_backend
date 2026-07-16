<?php

namespace Database\Seeders;

use App\Models\Instalacion;
use App\Models\Sede;
use Illuminate\Database\Seeder;

class InstalacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sedes = [
            'LIM-01' => [
                'Tienda Jesús María',
            ],
            'ARE-01' => [
                'Tienda Arequipa',
            ],
        ];

        foreach ($sedes as $codigoSede => $instalaciones) {
            $sedeId = Sede::where('codigo', $codigoSede)->value('id');

            if (! $sedeId) {
                $this->command?->warn("Sede con código '{$codigoSede}' no encontrada, se omite.");

                continue;
            }

            foreach ($instalaciones as $nombre) {
                Instalacion::updateOrCreate(
                    [
                        'sede_id' => $sedeId,
                        'nombre' => $nombre,
                    ],
                    [
                        'tipo' => 'tienda',
                        'activo' => true,
                    ]
                );
            }
        }
    }
}
