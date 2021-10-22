<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SistemaSalud;

class SistemaSaludApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sistema_salud()
    {
        $sistemaSalud = factory(SistemaSalud::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sistema_saluds', $sistemaSalud
        );

        $this->assertApiResponse($sistemaSalud);
    }

    /**
     * @test
     */
    public function test_read_sistema_salud()
    {
        $sistemaSalud = factory(SistemaSalud::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sistema_saluds/'.$sistemaSalud->id
        );

        $this->assertApiResponse($sistemaSalud->toArray());
    }

    /**
     * @test
     */
    public function test_update_sistema_salud()
    {
        $sistemaSalud = factory(SistemaSalud::class)->create();
        $editedSistemaSalud = factory(SistemaSalud::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sistema_saluds/'.$sistemaSalud->id,
            $editedSistemaSalud
        );

        $this->assertApiResponse($editedSistemaSalud);
    }

    /**
     * @test
     */
    public function test_delete_sistema_salud()
    {
        $sistemaSalud = factory(SistemaSalud::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sistema_saluds/'.$sistemaSalud->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sistema_saluds/'.$sistemaSalud->id
        );

        $this->response->assertStatus(404);
    }
}
