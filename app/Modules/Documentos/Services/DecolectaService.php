<?php

namespace App\Modules\Documentos\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class DecolectaService
{
    private array $apiKeys;

    private string $baseUrl;

    public function __construct()
    {
        $this->apiKeys = array_filter(array_map('trim', explode(',', (string) config('services.decolecta.key'))));
        $this->baseUrl = config('services.decolecta.base_url');
    }

    public function consultarDni(string $dni): array
    {
        return Cache::remember("decolecta:dni:{$dni}", now()->addDay(), fn () => $this->request('/reniec/dni', ['numero' => $dni]));
    }

    public function consultarRuc(string $ruc): array
    {
        return Cache::remember("decolecta:ruc:{$ruc}", now()->addDay(), fn () => $this->request('/sunat/ruc', ['numero' => $ruc]));
    }

    private function request(string $endpoint, array $query): array
    {
        $lastException = null;

        foreach ($this->apiKeys as $key) {
            try {
                $response = Http::withToken($key)
                    ->timeout(8)
                    ->get($this->baseUrl.$endpoint, $query);

                if ($response->successful()) {
                    return $response->json();
                }

                if (in_array($response->status(), [401, 429], true)) {
                    continue; // probar la siguiente key
                }

                $response->throw();
            } catch (\Throwable $e) {
                $lastException = $e;

                continue;
            }
        }

        throw $lastException ?? new \RuntimeException('No se pudo consultar Decolecta');
    }
}
