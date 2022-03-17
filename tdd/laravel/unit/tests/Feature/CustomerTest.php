<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function apenas_usuarios_logados_podem_ver_a_lista_de_clientes()
    {
        // se não tiver logado é redirecionado pra /login
        $response = $this->get('/customers')
            ->assertRedirect('/login');
    }
}
