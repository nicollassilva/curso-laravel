@extends('admin.layouts.app')

@section('title', "Produto: {$product->name}")

@section('content')
    <h1>Produto {{$product->name}} <a href="{{ route('products.index') }}">Voltar</a></h1>
    <ul>
        <li><strong>Nome: </strong>{{$product->name}}</li>
        <li><strong>Descrição: </strong>{{$product->description}}</li>
        <li><strong>Preço: </strong>{{$product->price}}</li>
    </ul>

    <form action="{{ route('products.destroy', $product->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
@endsection