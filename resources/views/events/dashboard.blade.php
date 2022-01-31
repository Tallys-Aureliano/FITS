@extends('layouts.main')

@section('title', 'Adicionar Serviços')

@section('content')

<div class="col-md-10  offset-md-1 dashboard-title-container">
    <h1>Serviços que cadastrados por mim.</h1>
</div>
<div class="col-md-10  offset-md-1 dashboard-events-container">
    @if (count ($events) > 0)
    <table class = "table">
        <thead>
            <tr>
                <th scope="col">Código de Serviço </th>
                <th scope="col">Nome</th>
                <th scope="col">Funcionários </th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td scropt="row">{{ $loop->index + 1}}</td>
                    <td><a href="/events/{{ $event->id}}">{{$event->title}}</a></td>
                    <td>0</td>
                    <td>
                        <a href="{{route('serv.edit', ['event' => $event->id])}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a> 
                        <form action="/events/{{$event->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ino-icon name= trash-outline>Concluir Serviço</ino-icon></button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    @else 
    <p>Você ainda nao cadastrou serviços, <a href="/events/create">Criar serviços</a></p>
    @endif
</div>

@endsection()