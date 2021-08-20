@extends('Admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">

        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th class="right-align">Opções</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($empresa as $empresa)
                        <tr>
                            <td>{{$empresa->nome}}</td>
                            <td>{{$empresa->telefone}}</td>
                            <td>{{$empresa->endereco}}</td>
                            <td class="right-align">

                                <a href="{{route('admin.empresas.edit', $empresa->id)}}">
                                <span>
                                    <i class="material-icons blue-text text-accent-2">edit</i>
                                </span>
                                </a>

                                <form action="{{route('admin.empresas.destroy', $empresa->id)}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button style="border:0;background:transparent;" type="submit">

                                <span style="cursor: pointer">
                                    <i class="material-icons red-text text-accent-3">delete_forever</i>
                                </span>
                                </button>
                            </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Não há dados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.empresas.create')}}">
                <i class="large material-icons">
                    add
                </i>
            </a>
        </div>



    </section>

@endsection

