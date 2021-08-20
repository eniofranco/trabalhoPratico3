<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create(['nome'=> 'Matriz']);
        Tipo::create(['nome'=> 'Filial']);
        Tipo::create(['nome'=> 'Sucursal']);
    }
}
