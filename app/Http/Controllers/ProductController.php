<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $viewData=[];
        $viewData["title"]="Pokemons - Poke Store";
        $viewData["subtitle"]="Lista de Pokemon";
        $viewData["products"]= Product::all();
        return view('product.index')->with("viewData",$viewData);
    }

    public function show($id)
    {
       $viewData=[];
       $product=Product::findOrFail($id);
       $viewData["title"]=$product->getName()."-Poke Store";
       $viewData["subtitle"]=$product->getName()."-Informações do Pokemon";
       $viewData["product"]=$product;
       return view('product.show')->with("viewData",$viewData); 
    }
}