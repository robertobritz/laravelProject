@extends('admin.layout.app')

@section('title', "Detalhes do produto { $product->name}")
    
@section('content')  

<h1>Produto  {{ $product->name }} <a href="{{ route('produtos2.index') }}"><<</a></h1>


<ul>
    <li><strong>Nome: </strong>{{ $product->name }}</li>
    <li><strong>Preço: </strong>{{ $product->price }}</li>
    <li><strong>Descrição: </strong>{{ $product->description }}</li>
</ul>

<form actio="{{ route('produtos2.destroy', $product->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar o Produto: {{ $product->name}}</button>
</form>
@endsection