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
        $productsInCart=[];

        $productsInSession=$request->session()->get("products");
        if($productsInSession){
            $productsInCart=Pokemon::findMany(array_keys($productsInSession));
            $total=Pokemon::sumPricesByQuantities($productsInCart,$productsInSession);
        }

        $viewData=[];
        $viewData ["title"]="Carrinho";
        $viewData["subtitle"]="Carrinho de compras";
        $viewData ["total"]=$total;
        $viewData["products"]=$productsInCart;
        return view ('cart.index')->with("viewData",$viewData);
    }

    public function add(Request $request,$id)
    {
        $products=$request->session()->get("products");
        $products[$id]=$request->input('quantity');
        $request->session()->put('products',$products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function purchase (Request $request)
    {
        $productsInSession = $request -> session() -> get("products");
        if ($productsInSession){
            $userId = Auth::user()->getId;
            $order = new Order();
            $order -> setUserId ($userId);
            $order -> setTotal(0);
            $order -> save();

            $total = 0;
            $productsInCart = Pokemon::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product){
                $quantity = $productsInSession [$product -> getId()];
                $item = new Item();
                $item -> setQuantity ($quantity);
                $item -> setPrice ($product -> getPrice());
                $item -> setProductId ($product -> getId());
                $item -> setOrderId ($order -> getId());
                $item -> save();
                $total = $total + ($product -> getPrice()*$quantity);
            }

            $order -> setTotal ($total);
            $order -> save();

            $newBalance = Auth::user() -> getBalance() - $total;
            Auth::user() -> setBalance ($newBalance);
            Auth::user() -> save();

            $request -> session() -> forget ('products');

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
