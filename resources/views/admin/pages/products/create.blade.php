@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')
    
@section('content')
    <h1>Cadastrar Novo Produto</h1>

     
    
     <form action="{{ route('Products.store') }}" method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.products._partials.form')
        
    </form>
@endsection