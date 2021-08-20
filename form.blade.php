@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">


        <form action="{{$action}}" method="POST">

            @csrf
            @isset($empresa)
                @method('PUT')
            @endisset

            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{old('nome', $empresa->nome ?? '' )}}"/>
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>
            <div class="input-field">
                <input type="text" name="telefone" id="telefone" value="{{old('telefone', $empresa->telefone ?? '' )}}"/>
                <label for="telefone">Telefone</label>
                @error('telefone')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>
            <div class="input-field">
                <input type="text" name="endereco" id="endereco" value="{{old('endereco', $empresa->endereco ?? '' )}}"/>
                <label for="endereco">Endereço</label>
                @error('endereco')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{route('admin.empresas.index')}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>

        </form>

    </section>

@endsection
