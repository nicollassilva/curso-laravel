@extends('admin.layouts.app')

@section('title', 'Cadastrar Produto')

@section('content')
    <h1>Cadastrar novo produto</h1>

    @include('admin.includes.alerts')

    <form class="form-group" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ old('name') }}"><br>
        <input type="text" class="form-control" name="description" placeholder="Descrição:" value="{{ old('description') }}"><br>
        <input type="number" class="form-control" name="price" placeholder="Preço:" value="{{ old('price') }}"><br>
        <input type="file" class="form-control" name="image" accept="image/*"><br>
        <button class="btn btn-success" type="submit">Enviar</button>
    </form>
@endsection