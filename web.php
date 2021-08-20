<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\DepartamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/', '/admin/empresas');



Route::prefix('admin')->name('admin.')->group(function(){



    Route::resource('empresas', EmpresaController::class)->except(['show']);
    Route::resource('departamentos', DepartamentoController::class);

});

Route::get('/sobre', function () {
    return '<h1>Sobre<h1>';
});
