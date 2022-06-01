<?php

namespace Tests\Unit;

use Tests\TestCase;

class CriarComentarioTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCriarComentario()
    {
        $response = $this->post("/comentario", ["comentario" => "Teste de comentario", "email" => "teste@teste.com.br", "id-topico" => 1]);
        $response->assertStatus(200);
    }
}
