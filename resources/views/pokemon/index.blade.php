@extends('layouts.app')
@section('title',$viewData["title"])
@section('subtitle',$viewData["subtitle"])
@section ('content')

<div class="row">
    @foreach($viewData["pokemons"] as $pokemon)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{asset('/storage/'.$pokemon->getImage())}}" class="card-img-top">
            <div class="card-body text-center">
                <a href="{{route('pokemon.show',['id'=>$pokemon->getId()]) }}"
                class="btn bg-primary text-white">{{$pokemon->getName()}}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

