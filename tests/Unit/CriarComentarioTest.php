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
        $response = $this->post("/comentarios", ["comentario" => "Teste de comentario", "email" => "teste@teste.com.br","permalink"=>"ola-mundo"]);
        $response->assertStatus(200);
    }
}
