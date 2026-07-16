<?php

namespace Database\Seeders;

use App\Models\Compania;
use App\Models\Sede;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companiaId = Compania::where('nombre', 'LIKE', 'BOTICA GROBDI')->value('id') ?? 1;

        foreach ([
            [
                'codigo' => 'LIM-01',
                'nombre' => 'Sede Lima',
                'direccion' => 'Av. Principal 123, Lima',
                'telefono' => '014567890',
                'email' => 'lima@grobdi.com',
            ],
            [
                'codigo' => 'ARE-01',
                'nombre' => 'Sede Arequipa',
                'direccion' => 'Av. Ejercito 456, Arequipa',
                'telefono' => '054123456',
                'email' => 'arequipa@grobdi.com',
            ],
        ] as $data) {
            Sede::updateOrCreate(
                ['compania_id' => $companiaId, 'codigo' => $data['codigo']],
                [
                    'nombre' => $data['nombre'],
                    'direccion' => $data['direccion'],
                    'telefono' => $data['telefono'],
                    'email' => $data['email'],
                    'activo' => true,
                ]
            );
        }
    }
}
