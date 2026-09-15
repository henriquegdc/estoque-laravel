@extends('layouts.app')
@section('titulo', 'Categorias')

@section('conteudo')
    <a href="{{ route('categorias.create') }}">Nova categoria</a>

    <table>
        <thead>
            <tr><th>Nome</th></tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nome }}</td>
                </tr>
            @empty
                <tr><td>Nenhuma categoria cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
