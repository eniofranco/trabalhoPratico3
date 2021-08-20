<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitulo = 'Lista da Empresa';
        $empresa = Empresa::orderBy('nome', 'asc')->get();
        return view('Admin.empresa.index', compact('subtitulo', 'empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.empresas.store');
        return view('Admin.Empresa.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        Empresa::create($request->all());
        $request->session()->flash('sucesso', "Funcionário $request->nome incluído com sucesso!");
        return redirect()->route('admin.empresas.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $action = route('admin.empresas.update', $empresa->id);
        return view('Admin.Empresa.form', compact('empresa', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {
        $empresa = Empresa::find($id);
        $empresa->update($request->all());

        $request->session()->flash('sucesso', "Funcionário $request->nome alterado com sucesso!");
        return redirect()->route('admin.empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Empresa::destroy($id);
        $request->session()->flash('sucesso', "Funcionário excluído com sucesso!");
        return redirect()->route('admin.empresas.index');
    }
}
