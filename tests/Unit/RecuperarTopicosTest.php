<?php

namespace Tests\Unit;

use Tests\TestCase;

class RecuperarTopicosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRecuperarTopicos()
    {
        $response = $this->get("/topicos");
        $response->assertStatus(200);
    }
}
