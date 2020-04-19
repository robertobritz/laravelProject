@extends('admin.layout.app')

@section('title', 'Cadastrar novo produto')

@section('content')
	<h1> Cadastrar Novo Produto </h1>
	
<form action="{{ route('produtos2.store')}}" method="post" enctype="multipart/form-data">
        @csrf
<input type="text" name="name" placeholder="Nome:" value="{{ old ('name')}}">
		<input type="text" name="description" placeholder="Descrição:" value="{{ old ('description')}}">
		<input type="file" name="photo">
		<button type="submit">Enviar</button>
	</form>

@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
	<li>{{$error}}</li>
		@endforeach
	</ul>	
@endif
@endsection