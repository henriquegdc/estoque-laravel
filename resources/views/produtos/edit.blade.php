@extends('layouts.app')
@section('titulo', 'Editar produto')

@section('conteudo')
    <h2>Editar {{ $produto->nome }}</h2>
    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')
        @include('produtos._form')
    </form>
@endsection