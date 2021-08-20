<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartamentoRequest;
use App\Models\Departamento;
use App\Models\Empresa;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::all();
        return view('Admin.Departamento.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        $tipos = Tipo::all();

        $action = route('admin.departamentos.store');
        return view('Admin.Departamento.form', compact('action', 'empresas', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoRequest $request)
    {

        DB::beginTransaction();

        Departamento::create($request->all());

        DB::commit();

        $request->session()->flash('sucesso', "Departamento incluído com sucesso!");
        return redirect()->route('admin.departamentos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::with(['empresa', 'tipo'])->find($id);

        return view('Admin.Departamento.show', compact('departamento'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $departamento = Departamento::with(['empresa', 'tipo'])->find($id);

        $empresas = Empresa::all();
        $tipos = Tipo::all();

        $action = route('admin.departamentos.update', $departamento->id);
        return view('Admin.Departamento.form', compact('departamento', 'action', 'empresas', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoRequest $request, $id)
    {
        $departamento = Departamento::find($id);

        $departamento->update($request->all());


        $request->session()->flash('sucesso', "Departamento atualizado com sucesso!");
        return redirect()->route('admin.departamentos.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $departamento = Departamento::find($id);

        $departamento->delete();

        $request->session()->flash('sucesso', "Departamento excluído com sucesso!");
        return redirect()->route('admin.departamentos.index');

    }
}
