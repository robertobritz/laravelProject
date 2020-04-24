@extends('admin.layout.app')

@section('title', "Editar Produto {{$product->name}}")

@section('content')
	<h1> Editar Produto {{ $product->name }} </h1>
	
<form action="{{ route('produtos2.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
		<div class="form-group">
			<input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $product->name}}">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="price" placeholder="Preço:" value="{{ $product->price}}">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="description" placeholder="Descrição:" value="{{ $product->description}}">
		</div>
		<div class="form-group">
			<input type="file" class="form-control" name="image">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Enviar</button>
		</div>
	</form>
@endsection