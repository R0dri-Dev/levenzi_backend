<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoUnidadMedida extends Model
{
    protected $table = 'tipos_unidad_medida';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function unidadesMedida(): HasMany
    {
        return $this->hasMany(UnidadMedida::class, 'tipo_unidad_medida_id');
    }
}
