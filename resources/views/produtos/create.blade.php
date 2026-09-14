@extends('layouts.app')
@section('titulo', 'Novo produto')

@section('conteudo')
    <h2>Novo produto</h2>
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        @include('produtos._form')
    </form>
@endsection