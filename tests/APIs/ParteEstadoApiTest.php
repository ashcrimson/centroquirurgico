<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParteEstado;

class ParteEstadoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte_estado()
    {
        $parteEstado = factory(ParteEstado::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parte_estados', $parteEstado
        );

        $this->assertApiResponse($parteEstado);
    }

    /**
     * @test
     */
    public function test_read_parte_estado()
    {
        $parteEstado = factory(ParteEstado::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parte_estados/'.$parteEstado->id
        );

        $this->assertApiResponse($parteEstado->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte_estado()
    {
        $parteEstado = factory(ParteEstado::class)->create();
        $editedParteEstado = factory(ParteEstado::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parte_estados/'.$parteEstado->id,
            $editedParteEstado
        );

        $this->assertApiResponse($editedParteEstado);
    }

    /**
     * @test
     */
    public function test_delete_parte_estado()
    {
        $parteEstado = factory(ParteEstado::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parte_estados/'.$parteEstado->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parte_estados/'.$parteEstado->id
        );

        $this->response->assertStatus(404);
    }
}
