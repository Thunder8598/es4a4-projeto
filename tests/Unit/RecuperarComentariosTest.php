<?php

namespace Tests\Unit;

use Tests\TestCase;

class RecuperarComentariosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRecuperarComentarios()
    {
        $response = $this->get("/comentarios?page=1");
        $response->assertStatus(200);
    }
}
