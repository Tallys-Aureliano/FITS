@extends('layouts.main')

@section('title','Editando Serviço' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando Serviço: {{ $event->title}}</h1>
    <form action="{{route('serv.upd', ['event' => $event->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="image">Imagem do Automóvel:</label>
        <input type="file" id="image" name="image" class="from-control-file">
        <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview">
    </div>
    <div class="form-group">
        <label for="title">Serviço(s):</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do serviço" value="{{$event->title}}">
    </div>
    <div class="form-group">
        <label for="title">Data de entrada:</label>
        <input type="date" class="form-control" id="date" name="date" value= "{{$event->date->format('Y-a-m')}}">
    </div>
    <div class="form-group">
        <label for="title">Data de prazo:</label>
        <input type="date" class="form-control" id="datep" name="datep">
    </div>
    <div class="form-group">
        <label for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{$event->city}}">
    </div>
    <div class="form-group">
        <label for="title">Descrição:</label>
        <textarea name="description" id="description"class="form-control" placehold="O que vai acontecer no evento?" {{$event->description}}></textarea>
    </div>
    <div class="form-group">
        <label for="title">O serviço é de urgência?</label>
        <select name="private" id="private" class="form-control">
            <option value="0">Não</option>
            <option value="1" {{$event->private == 1 ? "selected='selected'" : " " }}>Sim</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Adicione produtos para serviço:</label>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Óleo">Óleo 
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Rodas">Rodas
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Parafusos">Parafusos
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Cera automotiva">Cera automotiva
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Solução - Limpador automotivo">Solução - Limpador automotivo
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Serviço">
</form>
    </div>
@endsection