<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $viewData=[];
        $viewData["title"]="Produtos - Luany Store";
        $viewData["subtitle"]="Lista de produtos";
        $viewData["products"]= Product::all();
        return view('product.index')->with("viewData",$viewData);
    }

    public function show($id)
    {
       $viewData=[];
       $product=Product::findOrFail($id);
       $viewData["title"]=$product->getName()."-Luany Store";
       $viewData["subtitle"]=$product->getName()."-Informações do Produto";
       $viewData["product"]=$product;
       return view('product.show')->with("viewData",$viewData); 
    }
}