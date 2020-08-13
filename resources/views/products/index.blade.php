@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="float-left">Produtos</h4>
                <a href="{{route('products.create')}}" class="btn btn-success float-right">
                    <strong>Novo Produto</strong>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            @forelse ($products as $product)
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                        </tr>
                    </tbody>
                    </table>
            @empty
                <p class="alert alert-info">Nenhum Produto Cadastrado!</p>
            @endforelse
        </div>
    </div>
@endsection
