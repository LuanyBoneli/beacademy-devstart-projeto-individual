@extends('layouts.app')
@section('title', $viewData["title"])
@section ('content')
<div class="row">
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{asset('/img/pikachu.png')}}"class="img-fluid rounded">
    </div>
    
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{asset('img/charizard.jpg')}}" class="img-fluid rounded">
    </div>

    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{('img/snorlax.jpg')}}" class="img-fluid rounded">
    </div>
</div>    
@endsection

