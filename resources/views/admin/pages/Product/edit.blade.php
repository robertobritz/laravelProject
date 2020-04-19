@extends('admin.layout.app')

@section('title', 'Editar Produto')

@section('content')
	<h1> Editar Produto {{ $id }} </h1>
	
<form action="{{ route('produtos2.update', $id)}}" method="post">
        @method('PUT')
        @csrf
		<input type="text" name="name" placeholder="Nome:">
		<input type="text" name="description" placeholder="Descrição:">
		<button type="submit">Enviar</button>
	</form>
@endsection