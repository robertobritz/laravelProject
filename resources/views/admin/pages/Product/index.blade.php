@extends('admin.layout.app')

@section('title', 'Teste de sobreposição de titulo')
    
@section('content')  
    <h1> Exibindo os produtos </h1>

<a href="{{ route('produtos2.create') }}">Cadastrar</a>




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

@endsection

@push('styles')
	<style>
		.last {background: #CCC;}
	</style>
@endpush

@push('scripts')
	<script>
		document.body.style.background = '#cca'
	</script>
@endpush