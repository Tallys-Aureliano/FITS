@extends ('layouts.main')
@section('title','Produto')
@section('content')
    @if($id !=null)
        <p>exibindo produto id:{{ $id }}</p>
    @endif
@endsection