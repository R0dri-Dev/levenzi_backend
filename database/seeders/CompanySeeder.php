<?php

namespace Database\Seeders;

use App\Models\Compania;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Compania::create([
            'nombre' => 'GROBDI SOCIEDAD ANONIMA CERRADA-GROBDI S.A.C.',
            'direccion' => 'AV. BRASIL NRO. 1241 URB. FUNDO OYAGUE LIMA - LIMA - JESUS MARIA',
            'ruc' => '20602806023',
        ]);

    }
}
