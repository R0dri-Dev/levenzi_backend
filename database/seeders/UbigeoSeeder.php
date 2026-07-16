<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UbigeoSeeder extends Seeder
{
    public function run(): void
    {
        $basePath = database_path('seeders/data/ubigeo');

        $this->seedDepartamentos("{$basePath}/1_ubigeo_departamentos.json");
        $this->seedProvincias("{$basePath}/2_ubigeo_provincias.json");
        $this->seedDistritos("{$basePath}/3_ubigeo_distritos.json");
    }

    /**
     * Lee el JSON y desenvuelve la key contenedora
     * (ubigeo_departamentos / ubigeo_provincias / ubigeo_distritos).
     */
    private function readJson(string $path, string $wrapperKey): array
    {
        if (! File::exists($path)) {
            throw new \RuntimeException("No se encontró el archivo: {$path}");
        }

        $decoded = json_decode(File::get($path), true, flags: JSON_THROW_ON_ERROR);

        return $decoded[$wrapperKey] ?? $decoded;
    }

    private function seedDepartamentos(string $path): void
    {
        $data = $this->readJson($path, 'ubigeo_departamentos');
        $now = now();
        $map = [];

        foreach ($data as $row) {
            $newId = DB::table('departamentos')->insertGetId([
                'codigo' => (string) $row['ubigeo'],
                'nombre' => $row['departamento'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $map[$row['id']] = $newId;
        }

        cache()->put('ubigeo_map_departamentos', $map, now()->addMinutes(30));
        $this->command?->info('Departamentos sembrados: '.count($map));
    }

    private function seedProvincias(string $path): void
    {
        $data = $this->readJson($path, 'ubigeo_provincias');
        $now = now();

        $departamentoMap = cache()->get('ubigeo_map_departamentos', []);
        $map = [];

        foreach ($data as $row) {
            $departamentoIdReal = $departamentoMap[$row['departamento_id']] ?? null;

            if (! $departamentoIdReal) {
                $this->command?->warn("Provincia '{$row['provincia']}' sin departamento válido, se omite.");

                continue;
            }

            $newId = DB::table('provincias')->insertGetId([
                'departamento_id' => $departamentoIdReal,
                'codigo' => (string) $row['ubigeo'],
                'nombre' => $row['provincia'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $map[$row['id']] = $newId;
        }

        cache()->put('ubigeo_map_provincias', $map, now()->addMinutes(30));
        $this->command?->info('Provincias sembradas: '.count($map));
    }

    private function seedDistritos(string $path): void
    {
        $data = $this->readJson($path, 'ubigeo_distritos');
        $now = now();

        $provinciaMap = cache()->get('ubigeo_map_provincias', []);
        $chunkInsert = [];
        $count = 0;

        foreach ($data as $row) {
            $provinciaIdReal = $provinciaMap[$row['provincia_id']] ?? null;

            if (! $provinciaIdReal) {
                $this->command?->warn("Distrito '{$row['distrito']}' sin provincia válida, se omite.");

                continue;
            }

            $chunkInsert[] = [
                'provincia_id' => $provinciaIdReal,
                'codigo' => (string) $row['ubigeo'],
                'nombre' => $row['distrito'],
                'created_at' => $now,
                'updated_at' => $now,
            ];

            $count++;

            if (count($chunkInsert) === 200) {
                DB::table('distritos')->insert($chunkInsert);
                $chunkInsert = [];
            }
        }

        if (! empty($chunkInsert)) {
            DB::table('distritos')->insert($chunkInsert);
        }

        cache()->forget('ubigeo_map_departamentos');
        cache()->forget('ubigeo_map_provincias');

        $this->command?->info("Distritos sembrados: {$count}");
    }
}
