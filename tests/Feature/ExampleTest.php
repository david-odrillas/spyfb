<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = factory(User::class)->make();
        $this->actingAs(user);
        $response = $this->post(route('pages.store'), [
                'name'  => 'Pagina Prueba',
                'link'  => 'linkprueba.com',
                'cel'   => '12345678',
                'address'   => 'calle prueba N. 5',
                'competence'    => 'SI',
        ]);
        $this->assertDatabaseHas('pages',[
            'name'      => 'Pagina Prueba',
        ]);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
