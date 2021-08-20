<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->integer('codigo');
            $table->string('responsavel', 100);
            $table->text('descricao')->nullable();
            $table->decimal('salario', 12, 2);

            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->foreignId('tipo_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
