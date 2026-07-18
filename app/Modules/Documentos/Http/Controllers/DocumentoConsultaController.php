<?php

namespace App\Modules\documentos\Http\Controllers;

use App\Modules\Documentos\Http\Requests\ConsultaDocumentoRequest;
use App\Modules\Documentos\Services\DecolectaService;
use Illuminate\Support\Facades\Log;

class DocumentoConsultaController
{
    public function __construct(private readonly DecolectaService $decolecta) {}

    public function dni(ConsultaDocumentoRequest $request)
    {
        try {
            return response()->json($this->decolecta->consultarDni($request->validated()['numero']));
        } catch (\Throwable $e) {
            Log::warning('Error consultando DNI en Decolecta', ['error' => $e->getMessage()]);

            return response()->json(['message' => 'No se pudo consultar el DNI'], 502);
        }
    }

    public function ruc(ConsultaDocumentoRequest $request)
    {
        try {
            return response()->json($this->decolecta->consultarRuc($request->validated()['numero']));
        } catch (\Throwable $e) {
            Log::warning('Error consultando RUC en Decolecta', ['error' => $e->getMessage()]);

            return response()->json(['message' => 'No se pudo consultar el RUC'], 502);
        }
    }
}
