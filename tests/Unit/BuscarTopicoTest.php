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
    public function testBuscaTopico()
    {
        $response = $this->get("/buscar?busca=olá+mundo");
        $response->assertStatus(200);
    }
}
