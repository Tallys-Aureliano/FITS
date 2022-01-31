@extends('layouts.main')

@section('title','Casa da Lubrificação')

@section('content')
    
<div id="search-container" class="col-md-12">
        <h1 style="color: #fcd523">Procurar Serviço</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
        </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Serviços Cadastrados</h2>
    <p class="subtitle">Veja os serviços</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{$event->image }}" alt="{{ $event->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participantes"> 1 servidor</p>
                <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($events)==0 && $search)
            <p>Não foi possivel encontrar nenhum serviço com <b>{{ $search }}!</b> <a href="/">Ver todos</a></p>
            @elseif(count($events)==0)
            <p>Os serviços ainda não foram cadastrados</p>
        @endif
    </div>
</div>
@endsection