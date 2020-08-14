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
            <table class="table table-striped">
                <thead>
                    <th scope="col">Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{$product->name}}</th>
                            <td>R$ {{$product->unit_price}}</td>
                            <td>
                                <a class="btn btn-sm btn-dark" href="{{route('products.show', $product)}}">
                                    <strong>ver produto</strong>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="{{'#modal'.$product->id}}">
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
                            </td>
                        </tr>
                    @empty
                        <p class="alert alert-info">Nenhum Produto Cadastrado!</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function showPrice(qtd, productPrice, totalId) {
            let totalPrice = qtd * productPrice;
            totalId.innerHTML = `Total: <strong>R$ ${totalPrice},00</strong>`;
        }
    </script>
@endsection
