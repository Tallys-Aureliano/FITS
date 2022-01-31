@extends('layouts.main')

@section('title', 'Adicionar serviços')

@section('content')

<div class="col-md-10  offset-md-1 dashboard-title-container">
    <h1>Serviços que Cadastrados por mim.</h1>
</div>
<div class="col-md-10  offset-md-1 dashboard-events-container">
    @if (count ($events) > 0)
    @else 
    <p>Você ainda não cadastrou serviços, <a href="/events/creat">Criar Serviços</a></p>
    @endif
</div>

@endsection()