@extends('layouts.app')
@section('title',$viewData["title"])
@section ('subtitle',$viewData["subtitle"])
@section ('content')

<div class="card">
    <div class="card-header">
        Produtos no carrinho
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["pokemons"] as $pokemon)
                <tr>
                    <td>{{ $pokemon->getId() }}</td>
                    <td>{{ $pokemon->getName() }}</td>
                    <td>{{ $pokemon->getPrice()}}</td>
                    <td>{{session('pokemons')[$pokemon->getId()]}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secundary mb-2"><b>Total a pagar:</b>${{$viewData["total"]}}</a>
                @if (count($viewData["pokemons"])>0)
                <a href = "{{route('cart.purchase')}}" class="btn bg-primary text-white mb-2">Compra</a>
                <a href="{{route('cart.delete')}}">
                    <button class="btn btn-danger mb-2">
                        Remover todos os produtos do carrinho
                    </button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
