@extends('admin.layout.app')

@section('title', 'Teste de sobreposição de titulo')
    
@section('content')  
    <h1> Exibindo os produtos </h1>
    <a href="{{ route('produtos2.create') }}" class="btn btn-primary">Cadastrar</a>

<form action="{{ route('produtos2.search') }}" method="post" class="form form-inline" >
    @csrf
<input type="text" name="filter" placeholder="Filtrar" class="form-control" value="{{ $filters['filter'] ?? '' }}" >
    <button type="submit" class="btn btn-info">Buscar</button>
</form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>    
        </thead> 
        <tbody>
            @foreach ($products as $product)
                 <tr> 
                    <td>
                        @if ($product->image) {{-- valida se produto tem imagem --}}
                    <img src="{{ url("storage/{$product->image}")}}" alt="{{$product->name}}" style="max-width: 100px;">
                            
                        @endif
                    </td>   
                <td>{{ $product->name}}</td>
                <td>{{ $product->price}}</td>
                 <td>
                 <a href="{{ route('produtos2.edit', $product->id)}}">Editar</a>
                 <a href="{{ route('produtos2.show', $product->id)}}">Detalhes</a>
                </td>
                </tr>   
            @endforeach
        </tbody>     
    </table>
    @if (isset($filters)) {{-- Executa somente se o filter existir e ele so existe na busca --}}  
         {!! $products->appends($filters)->links() !!} 
    @else
    {!! $products->links() !!} 
    @endif

   

{{--  

@component('admin.components.card')
	@slot('title')
		<h1>Título Slot</h1>
	@endslot
	Um card de exemplo
@endcomponent

<hr>

    @include ('admin.includes.alerta', ['content' => 'Alerta de preços de produtos'])


    @if (isset($produtos))
        @foreach ($produtos as $produto) 
            <p class="@if ($loop->last) last @endif">{{$produto}}</p>
        @endforeach
    @endif

    <hr>

    @forelse ($produtos as $produto)
        <p class="@if ($loop->first) last @endif">{{$produto}}</p>
    @empty
        <p>Não existem produtos cadastrados</p>
    @endforelse


    @if ($teste === 123)
        É igual
    @elseif ($teste == 123)
        É igual a 123
    @else
        é igual
    @endif
    
    @unless ($teste === '123') 
        // retorna se for diferente, oposto ao IF
    @else
        // retorna se for verdadeiro
    @endunless

    @isset($teste2)
        <p>{{ $teste2 }} </p> Mosta o valor da variável se estiver definida
    @endisset

    @empty($teste3)
        <p> apenas mostra quando estiver vazio
    @endempty

    @auth
        <p> Infomações quando tiver logado</p>
    @else
        <p> Não autenticado </p>        
    @endauth
     
    @guest
        <p> Para mostra infos não autenticados </p>
    @endguest
    
    @switch($teste)
        @case(1)
            Igual a 1 
            @break
        @case(2)
            Igual a 2
            @break
        @default
            Se for diferente
    @endswitch
--}}
@endsection

@push('styles')
	<style>
		.last {background: #CCC;}
	</style>
@endpush

@push('scripts')
	<script>
		document.body.style.background = '#aaa'
	</script>
@endpush