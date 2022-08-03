<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/pokemons','App\Http\Controllers\PokemonController@index')->name("pokemon.index");
Route::get('/pokemons/{id}','App\Http\Controllers\PokemonController@show')->name("pokemon.show");

Route::get('/cart','App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete','App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}','App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::middleware('admin')->group(function(){
    Route::get('/admin','App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/pokemons','App\Http\Controllers\Admin\AdminPokemonController@index')->name("admin.pokemon.index");
    Route::post('/admin/pokemons/store','App\Http\Controllers\Admin\AdminPokemonController@store')->name("admin.pokemon.store");
    Route::delete('/admin/pokemons/{id}/delete','App\Http\Controllers\Admin\AdminPokemonController@delete')->name("admin.pokemon.delete");
    Route::get('/admin/pokemons/{id}/edit','App\Http\Controllers\Admin\AdminPokemonController@edit')->name("admin.pokemon.edit");
    Route::put('/admin/pokemons/{id}/update','App\Http\Controllers\Admin\AdminPokemonController@update')->name("admin.pokemon.update");
});

Auth::routes();

