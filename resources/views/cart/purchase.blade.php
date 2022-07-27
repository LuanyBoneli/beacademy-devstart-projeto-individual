@extends ('layouts.app')
@section ('title',$viewData["title"])
@section ('subtitle',$viewData["subtitle"])
@section ('content')

<div class = "card">
    <div class = "card-header">
        Compra Concluída   
</div>

<div class = "card-body">
    <div class = "alert alert-success" role = "alert">
        Parabéns, compra concluída. O número do pedido é <b>#{{$viewData["order"] -> getId()}}</b>
    </div>
</div>
</div>
@endsection 