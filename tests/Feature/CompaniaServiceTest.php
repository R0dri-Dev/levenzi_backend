<?php

namespace Tests\Feature;

use App\Modules\companias\Services\CompaniaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompaniaServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_compania_ignoring_unsupported_fields(): void
    {
        $service = app(CompaniaService::class);

        $compania = $service->create([
            'nombre' => 'Empresa Test',
            'ruc' => '20123456789',
            'direccion' => 'Av. Test 123',
            'telefono' => '987654321',
            'activo' => true,
        ]);

        $this->assertSame('Empresa Test', $compania->nombre);
        $this->assertSame('20123456789', $compania->ruc);
        $this->assertSame('Av. Test 123', $compania->direccion);
        $this->assertDatabaseHas('companias', [
            'nombre' => 'Empresa Test',
            'ruc' => '20123456789',
            'direccion' => 'Av. Test 123',
        ]);
    }
}
