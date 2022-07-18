<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData=[];
        $viewData ["title"]= "Página Inicial - Luany Store";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData=[];
        $viewData["title"]= "Quem somos - Luany Store";
        $viewData["subtitle"]= "Quem somos";
        $viewData["description"]="Esta é uma loja virtual criada para o Programa DevStart Paylivre.";
        $viewData["author"]="Desenvolvida por: Luany Boneli";
        return view('home.about')->with("viewData", $viewData);
    }
}
