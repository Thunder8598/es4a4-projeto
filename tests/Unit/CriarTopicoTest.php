<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;

class CriarTopicoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCriarTopico()
    {

        $response = $this->post("/topicos", ["topico" => "Teste de tópico"]);
        $response->assertStatus(200);
    }
}
