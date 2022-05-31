<?php

namespace Tests\Unit;

use Tests\TestCase;

class BuscarTopicoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get("/topicos?busca=teste");
        $response->assertStatus(200);
    }
}
