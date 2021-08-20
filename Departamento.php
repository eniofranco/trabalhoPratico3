<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'codigo',
        'responsavel',
        'descricao',
        'salario',
        'empresa_id',
        'tipo_id',

    ];

    public function empresa(){

        return $this->belongsTo(Empresa::class);

    }

    use HasFactory;

    public function tipo(){

        return $this->belongsTo(Tipo::class);

    }



}
