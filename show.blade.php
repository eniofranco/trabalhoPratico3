@extends('Admin.layouts.principal')


@section('conteudo-principal')

    <h4>{{$departamento->titulo}}</h4>

    <section class="section">

        <div class="row">
        <span class="col s12">
            <h5>Funcionário</h5>
            <p>{{$departamento->empresa->nome}}</p>

        </span>
        </div>

        <div class="row">
            <span class="col s12">
                <h5>Tipo do Departamento</h5>
                <p>{{$departamento->tipo->nome}}</p>

            </span>
            </div>

            <div class="row">
                <span class="col s12">
                    <h5>Salário</h5>
                    <p>{{$departamento->salario}}</p>

                </span>
                </div>

                <div class="row">
                    <span class="col s12">
                        <h5>Código do Departamento</h5>
                        <p>{{$departamento->codigo}}</p>

                    </span>
                </div>

                <div class="row">
                    <span class="col s12">
                        <h5>Responsável</h5>
                        <p>{{$departamento->responsavel}}</p>

                    </span>
                    </div>

                    <div class="row">
                        <span class="col s12">
                            <h5>Comentário</h5>
                            <p>{{$departamento->descricao}}</p>

                        </span>
                        </div>

                        <div class="right-align">
                            <a href="{{url()->previous()}}" class="btn-flat waves-effect">Voltar</a>
                        </div>

    </section>

@endsection
