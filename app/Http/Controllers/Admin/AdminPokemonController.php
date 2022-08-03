<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pokemon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPokemonController extends Controller
{
    public function index()
    {
        $viewData=[];
        $viewData["title"]="Administração - Pokemon- Poke Store";
        $viewData["pokemons"]= Pokemon::all();
        return view ('admin.pokemon.index')->with("viewData",$viewData);
    }

    public function store(Request $request)
    {

        $newPokemon= new Pokemon();
        $newPokemon->setName($request->input('name'));
        $newPokemon->setDescription($request->input('description'));
        $newPokemon->setPrice($request->input('price'));
        $newPokemon->setImage($request->file('image'));
        $newPokemon->setCategory($request->input('category'));
        $newPokemon->setHeight($request->input('height'));
        $newPokemon->setWeight($request->input('weight'));
        $newPokemon->setAbilities($request->input('abilities'));
        $newPokemon->setGender($request->input('gender'));
        $newPokemon->setHp($request->input('hp'));
        $newPokemon->setAttack($request->input('attack'));
        $newPokemon->setDefense($request->input('defense'));
        $newPokemon->setSpecialAttack($request->input('special_attack'));
        $newPokemon->setSpecialDefense($request->input('special_defense'));
        $newPokemon->setSpeed($request->input('speed'));
        $newPokemon->save();

        if($request->hasFile('image')){
            $imageName=$newPokemon->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newPokemon->setImage($imageName);
            $newPokemon->save();
        }

        return back();
    }

    public function delete($id)
    {
        Pokemon::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData=[];
        $viewData["title"]="Página Admin-Editar Pokemon - Poke Store";
        $viewData["pokemon"]=Pokemon::findOrFail($id);
        return view('admin.pokemon.edit')->with("viewData",$viewData);
    }

    public function update(Request $request,$id)
    {
        Pokemon::validate($request);

        $pokemon=Pokemon::findOrFail($id);
        $pokemon->setName($request->input('name'));
        $pokemon->setDescription($request->input('description'));
        $pokemon->setPrice($request->input('price'));

        if($request->hasFile('image')){
            $imageName=$pokemon->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $pokemon->setImage('imageName');
        }
        $pokemon->save();
        return redirect()->route('admin.pokemon.index');
    }
}
