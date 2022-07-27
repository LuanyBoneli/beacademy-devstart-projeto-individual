<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Pokemon;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this -> attributes ['id'] -int-contains the item primary key(id)
     * $this -> attributes ['quantity']- int - contains the item quantity
     * $this -> attributes ['price'] - int- contains the price
     * $this -> attributes ['order_id'] - int - contains the referenced order id
     * $this -> attributes ['pokemon_id']- int- contains the referenced pokemon id
     * $this -> attributes ['created_id'] - timestamp - contains the item creation date
     * $this -> attributes ['updated_id'] - timestamp- contains the item update date
     * $this -> order - Order- contains the associated Order
     * $this -> pokemon - Pokemon - contains the associated Pokemon
     */

     public static function validate($request)
     {
        $request -> validate([
            "price" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0",
            "pokemon_id" => "required|exists:pokemons,id",
            "order_id" => "required|exists:orders,id",
        ]);
     }

     public function getId()
     {
        return $this -> attributes ['id'];
     }

     public function setId($id)
     {
        $this -> attributes ['id'] = $id;
     }

     public function getQuantity()
     {
        return $this -> attributes ['quantity'];
     }

     public function setQuantity($quantity)
     {
        $this -> attributes ['quantity'] = $quantity;
     }

     public function getPrice()
     {
        return $this -> attributes ['price'];
     }

     public function setPrice($price)
     {
        $this -> attributes ['price'] = $price;
     }

     public function getOrderId()
     {
        return $this -> attributes ['order_id'];
     }

     public function setOrderId($orderId)
     {
        $this -> attributes ['order_id'] = $orderId;
     }

     public function getPokemonId()
     {
        return $this -> attributes['pokemon_id'];
     }

     public function setPokemonId($pokemonId)
     {
        $this -> attributes ['pokemon_id'] = $pokemonId;
     }

     public function getCreatedAt()
     {
        return $this -> attributes ['created_at'];
     }

     public function setCreatedAt($createdAt)
     {
        $this -> attributes ['created_at'] = $createdAt;
     }

     public function getUpdateAt()
     {
        return $this -> attributes ['updated_at'];
     }

     public function setUpdateAt($updatedAt)
     {
        $this -> attributes ['updated_at'] = $updatedAt;
     }

     public function order()
     {
        return $this -> belongsTo(Order::class);
     }

     public function getOrder()
     {
        return $this -> order;
     }

     public function setOrder($order)
     {
        $this -> order = $order;
     }

     public function pokemon()
     {
        return $this -> belongsTo (Pokemon::class);
     }

     public function getPokemon()
     {
        return $this -> pokemon;
     }

     public function setPokemon($pokemon)
     {
        $this -> pokemon = $pokemon;
     }
}

