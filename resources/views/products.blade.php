@extends('layouts.main')
@section('title','Casa da Lubrificação')
@section('content')

    <h1>Tela de produtos</h1>

    @if($busca !='')
    <p>o usuario esta buscando por: {{ $busca }}</p>
    @endif
@endsection
