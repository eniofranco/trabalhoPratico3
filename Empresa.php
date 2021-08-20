<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'telefone', 'endereco'];

    public function departamentos(){

        return $this->hasMany(Departamento::class);



    }

}
