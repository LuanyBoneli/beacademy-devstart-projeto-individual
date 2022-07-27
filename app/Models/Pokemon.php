<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Pokemon extends Model

{

    /**
     * POKEMON ATRIBUTES
     * $this->attributes['id']-int- contains the pokemon primary key(id)
     * $this->attributes['name']- string-contains the pokemon name
     * $this->attributes['description']-string-contains the pokemon description
     * $this->attributes['image']-string-contains the pokemon image
     * $this->attributes['price']-int-contains the pokemon price
     * $this->attributes['created_at']-timestamp-contains the pokemon creation date
     * $this->attributes['updated_at']-timestamp-contains the pokemon update date
     * $this->items-Item[] - contains the associated items
     */
    public static function validate($request)
    {
        $request->validate([
            "name"=>"required|max:255",
            "description"=>"required",
            "price"=>"required|numeric|gt:0",
            'image'=>'image',
        ]);
    }

    public static function sumPricesByQuantities($pokemons,$pokemonsInSession)
    {
        $total=0;
        foreach($pokemons as $pokemon){
            $total=$total + ($pokemon->getPrice()*$pokemonsInSession[$pokemon->getId()]);
        }
        return $total;
    }

     public function getId()
     {
        return $this->attributes['id'];
     }

     public function setId($id)
     {
        $this->attributes['id']=$id;
     }

     public function getName()
     {
        return $this->attributes['name'];
     }

     public function setName($name)
     {
        $this->attributes['name']=$name;
     }

     public function getDescription()
     {
        return $this->attributes['description'];
     }

    public function setDescription($description)
    {
        $this->attributes['description']=$description;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image']=$image;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price']=$price;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category)
    {
        $this->attributes['category']=$category;
    }

    public function getHeight()
    {
        return $this->attributes['height'];
    }

    public function setHeight($height)
    {
        $this->attributes['height']=$height;
    }

    public function getWeight()
    {
        return $this->attributes['weight'];
    }

    public function setWeight($weight)
    {
        $this->attributes['weight']=$weight;
    }

    public function getAbilities()
    {
        return $this->attributes['abilities'];
    }

    public function setAbilities($abilities)
    {
        $this->attributes['abilities']=$abilities;
    }

    public function getGender()
    {
        return $this->attributes['gender'];
    }

    public function setGender($gender)
    {
        $this->attributes['gender']=$gender;
    }

    public function getHp()
    {
        return $this->attributes['hp'];
    }

    public function setHp($hp)
    {
        $this->attributes['hp']=$hp;
    }

    public function getAttack()
    {
        return $this->attributes['attack'];
    }

    public function setAttack($attack)
    {
        $this->attributes['attack']=$attack;
    }

    public function getDefense()
    {
        return $this->attributes['defense'];
    }

    public function setDefense($defense)
    {
        $this->attributes['defense']=$defense;
    }

    public function getSpecialAttack()
    {
        return $this->attributes['special_attack'];
    }

    public function setSpecialAttack($specialAttack)
    {
        $this->attributes['special_attack']=$specialAttack;
    }

    public function getSpecialDefense()
    {
        return $this->attributes['special_defense'];
    }

    public function setSpecialDefense($specialDefense)
    {
        $this->attributes['special_defense']=$specialDefense;
    }

    public function getSpeed()
    {
        return $this->attributes['speed'];
    }

    public function setSpeed($speed)
    {
        $this->attributes['speed']=$speed;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatAt($createdAt)
    {
        $this->attributes['created_at']=$createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at']=$updatedAt;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

}
