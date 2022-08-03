<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $pokemonsInCart=[];

        $pokemonsInSession=$request->session()->get("pokemons");
        if($pokemonsInSession){
            $pokemonsInCart=Pokemon::findMany(array_keys($pokemonsInSession));
            $total=Pokemon::sumPricesByQuantities($pokemonsInCart,$pokemonsInSession);
        }

        $viewData=[];
        $viewData ["title"]="Carrinho";
        $viewData["subtitle"]="Carrinho de compras";
        $viewData ["total"]=$total;
        $viewData["pokemons"]=$pokemonsInCart;
        return view ('cart.index')->with("viewData",$viewData);
    }

    public function add(Request $request,$id)
    {
        $pokemons=$request->session()->get("pokemons");
        $pokemons[$id]=$request->input('quantity');
        $request->session()->put('pokemons',$pokemons);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('pokemons');
        return back();
    }

    public function purchase (Request $request)
    {
        $pokemonsInSession = $request -> session() -> get("pokemons");
        if ($pokemonsInSession){
            $userId = Auth::user()->getId();
            $order = new Order();
            $order -> setUserId ($userId);
            $order -> setTotal(0);
            $order -> save();

            $total = 0;
            $pokemonsInCart = Pokemon::findMany(array_keys($pokemonsInSession));
            foreach ($pokemonsInCart as $pokemon){
                $quantity = $pokemonsInSession [$pokemon -> getId()];
                $item = new Item();
                $item -> setQuantity ($quantity);
                $item -> setPrice ($pokemon -> getPrice());
                $item -> setPokemonId ($pokemon -> getId());
                $item -> setOrderId ($order -> getId());
                $item -> save();
                $total = $total + ($pokemon -> getPrice()*$quantity);
            }

            $order -> setTotal ($total);
            $order -> save();

            $newBalance = Auth::user() -> getBalance() - $total;
            Auth::user() -> setBalance ($newBalance);
            Auth::user() -> save();

            $request -> session() -> forget ('pokemons');

            $viewData = [];
            $viewData ["title"] = "Compra";
            $viewData ["subtitle"] = "Status da Compra";
            $viewData ["order"] = $order;
            return view ('cart.purchase') -> with ("viewData", $viewData);
        } else {
            return redirect () -> route('cart.index');
        }
    }
}
