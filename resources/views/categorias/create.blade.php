@extends('layouts.app')
@section('titulo', 'Nova Categoria')

@section('conteudo')
    <h2>Nova Categoria</h2>

    @if ($errors->any())
        <ul class="erro">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <label>Nome
            <input type="text" name="nome" value="{{ old('nome') }}">
        </label>

        <p><button type="submit">Salvar</button></p>
    </form>
@endsection
