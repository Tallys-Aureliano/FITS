@extends('layouts.main')

@section('title','Cadastrar serviço')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre um novo serviço</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image">Imagem do Automóvel:</label>
        <input type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
        <label for="title">Serviço(s):</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do serviço">
    </div>
    <div class="form-group">
        <label for="title">Data de entrada:</label>
        <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
        <label for="title">Data de prazo:</label>
        <input type="date" class="form-control" id="datep" name="datep">
    </div>
    <div class="form-group">
        <label for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
    </div>
    <div class="form-group">
        <label for="title">Descrição:</label>
        <textarea name="description" id="description"class="form-control" placehold="O que vai acontecer no evento?"></textarea>
    </div>
    <div class="form-group">
        <label for="title">O serviço é de urgência?</label>
        <select name="private" id="private" class="form-control">
            <option value="0">Não</option>
            <option value="1">Sim</option>
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
    <input type="submit" class="btn btn-primary" value="Criar Evento">
</form>
    </div>
@endsection