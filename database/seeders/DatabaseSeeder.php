<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UsuariosSeeder::class);
        $this->call(UbigeoSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(SedeSeeder::class);
        $this->call(InstalacionSeeder::class);
        $this->call(PaisSeeder::class);
    }
}
