<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        $viewData=[];
        $viewData["title"]="Pokemons - Poke Store";
        $viewData["subtitle"]="Lista de Pokemon";
        $viewData["pokemons"]= Pokemon::all();
        return view('pokemon.index')->with("viewData",$viewData);
    }

    public function show($id)
    {
       $viewData=[];
       $pokemon=Pokemon::findOrFail($id);
       $viewData["title"]=$pokemon->getName()."-Poke Store";
       $viewData["subtitle"]=$pokemon->getName()."-Informações do Pokemon";
       $viewData["pokemon"]=$pokemon;
       return view('pokemon.show')->with("viewData",$viewData);
    }
}
