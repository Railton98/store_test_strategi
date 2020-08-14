@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="row" action="{{route('products.store')}}" method="post">
            @csrf
            <div class="form-group col-md-4">
                <label for="name">Nome do Produto</label>
                <input class="form-control" required type="text" name="name" id="name">
            </div>
            <div class="form-group col-md-4">
                <label for="unit_price">Preço da Unidade</label>
                <input class="form-control" required type="number" step=".01" value="0.00" name="unit_price" id="unit_price">
            </div>
            <div class="form-group col-md-4">
                <label for="quantity">Quantidade de Produtos</label>
                <input class="form-control" required type="number" step="1" value="1" name="quantity" id="quantity">
            </div>
            <div class="form-group col-md-12">
                <label for="description">Descrição do Produto</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="2"></textarea>
            </div>
            <div class="col-md-12">
                <button class="btn btn-secondary" type="submit">
                    <strong>Salvar</strong>
                </button>
            </div>
        </form>
    </div>
@endsection
