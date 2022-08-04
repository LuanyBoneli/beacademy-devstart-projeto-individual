@extends('layouts.admin')
@section('title',$viewData["title"])
@section('content')

<div class="card mb-4">
    <div class="card-header">
        Cadastrar Pokemons
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>-{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{route('admin.pokemon.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-10 col-form-label">Nome:</label>
                        <div class="col-lg-9 col-md-6 col-sm-12">
                            <input name="name" value="{{old('name')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Preço:</label>
                        <div class="col-lg-9 col-md-6 col-sm-12">
                            <input name="price" value="{{old('price')}}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Altura:</label>
                        <div class="col-lg-9 col-md-6 col-sm-12">
                            <input name="height" value="{{old('height')}}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Peso:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="weight" value="{{old('weight')}}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Categoria:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="category" value="{{old('category')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-5 col-md-6 col-sm-12 col-form-label">Habilidades:</label>
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <input name="abilities" value="{{old('abilities')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">HP:</label>
                        <div class="col-lg-9 col-md-6 col-sm-12">
                            <input name="hp" value="{{old('hp')}}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Ataque:</label>
                        <div class="col-lg-9 col-md-6 col-sm-12">
                            <input name="attack" value="{{old('attack')}}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Defesa:</label>
                        <div class="col-lg-9 col-md-6 col-sm-12">
                            <input name="defense" value="{{old('defense')}}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Ataque Especial:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="special_attack" value="{{old('special_attack')}}" type="number"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Defesa Especial:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="special_defense" value="{{old('special_defense')}}" type="number"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Velocidade:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="speed" value="{{old('speed')}}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Gênero:</label>
                        <div class="col-lg-9 col-md-6 col-sm-12">
                            <input name="gender" value="{{old('gender')}}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                        <div class="mb-3 row">
                            <label for="image" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input class="form-control" type="file" name="image" />
                            </div>
                        </div>
                    </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Gerenciar Pokemons
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            </tbody>
            @foreach ($viewData["pokemons"] as $pokemon)
            <tr>
                <td>{{$pokemon->getId()}}</td>
                <td>{{$pokemon->getName()}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.pokemon.edit',['id'=>$pokemon->getId()])}}">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('admin.pokemon.delete', $pokemon->getId())}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection