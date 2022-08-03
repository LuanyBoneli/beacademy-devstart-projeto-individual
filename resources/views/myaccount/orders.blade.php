@extends('layouts.app')
@section('title',$viewData["title"])
@section('subtitle',$viewData["subtitle"])
@section('content')

@forelse ($viewData["orders"] as $order)
<div class="card mb-4">
    <div class="card-header">
        Pedidos #{{ $order->getId() }}
</div>
<div class = "card-body">
    <b>Data:</b> {{ $order->getCreatedAt() }}<br/>
    <b>Total:</b> R${{$order->getTotal() }}<br/>
    <table class="table table-bordered table-striped text-center mt-3">
        <thead>
            <tr>
                <th scope="col">Item Id</th>
                <th scope="col">Produto</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->getItems() as $item)
            <tr>
                <td>{{ $item->getId() }}</td>
                <td> 
                    <a class = "link-success" href="{{route ('pokemon.show', ['id'=> $item->getpokemon()->getId()]) }}">
                        {{ $item->getpokemon()->getName() }}
                    </a>
                </td>
                <td> $ {{ $item->getPrice() }}</td>
                <td> {{ $item->getQuantity() }}</td>
            </tr>
            @endforeach
</tbody>
</table>
</div>
</div>
@empty

<div class="alert alert-danger" role="alert">
    Parece que você não comprou nada em nossa loja =( .
</div>
@endforelse
@endsection