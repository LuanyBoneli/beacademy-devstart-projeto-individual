<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PokemonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pokemon()
    {
        $response = $this->get('/pokemons');

        $response->assertStatus(200);
    }
}
