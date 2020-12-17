@extends('admin.layouts.app')

@section('title', 'Gestao de Produtos')
    
@section('content')
<h1>Exibindo os Produtos</h1>

<a href = "{{ route('Products.create') }}" class ="btn btn-primary">Cadastrar</a>
<hr>

<form action="{{route('Products.search') }}" method="post" class="form form-inline">
    @csrf
    <input type="text" name="filter" placeholder="Filtrar" class="form-control">
    <button type="submit" class="btn btn-info">Pesquisar</button>
</form>

<table class="table table-striped">
    <thead>
        <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th width='100'>Ações</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>
            <a href="{{route('Products.edit', $product->id)}}">Editar</a>
            <a href="{{route('Products.show', $product->id)}}">Detalhes</a>
        </td>
        </tr>   
        @endforeach
    </tbody>
</table>
{!!$products->links()!!}
@endsection
