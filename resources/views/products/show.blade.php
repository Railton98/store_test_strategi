@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Nome do Produto</label>
                <input class="form-control" readonly type="text" name="name" id="name" value="{{$product->name}}">
            </div>
            <div class="form-group col-md-4">
                <label for="unit_price">Preço da Unidade</label>
                <input class="form-control" readonly type="number" name="unit_price" id="unit_price" value="{{$product->unit_price}}">
            </div>
            <div class="form-group col-md-8">
                <label for="description">Descrição do Produto</label>
                <textarea class="form-control" readonly name="description" id="description" cols="30" rows="2">{{$product->description}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="{{'#modal'.$product->id}}">
                <strong>comprar</strong>
            </button>

            <div class="modal fade" id="{{'modal'.$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">{{$product->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="{{'product'.$product->id}}" action="{{route('products.sales.store', $product)}}" method="post">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="quantity">Quantas Unidades Deseja Comprar?</label>
                                    <input class="form-control" value="1" required type="number" min="1" name="quantity" id="quantity" oninput="showPrice(this.value, {{$product->unit_price}}, document.getElementById('{{'total'.$product->id}}'));">
                                </div>
                                <p id="{{'total'.$product->id}}">Total: <strong>R${{$product->unit_price}}</strong></p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="event.preventDefault();
                                document.getElementById('{{'product'.$product->id}}').submit();">
                                Confirmar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showPrice(qtd, productPrice, totalId) {
            let totalPrice = qtd * productPrice;
            totalId.innerHTML = `Total: <strong>R$ ${totalPrice},00</strong>`;
        }
    </script>
@endsection
