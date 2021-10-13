<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Especialida;

class EspecialidaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_especialida()
    {
        $especialida = factory(Especialida::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/especialidades', $especialida
        );

        $this->assertApiResponse($especialida);
    }

    /**
     * @test
     */
    public function test_read_especialida()
    {
        $especialida = factory(Especialida::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/especialidades/'.$especialida->id
        );

        $this->assertApiResponse($especialida->toArray());
    }

    /**
     * @test
     */
    public function test_update_especialida()
    {
        $especialida = factory(Especialida::class)->create();
        $editedEspecialida = factory(Especialida::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/especialidades/'.$especialida->id,
            $editedEspecialida
        );

        $this->assertApiResponse($editedEspecialida);
    }

    /**
     * @test
     */
    public function test_delete_especialida()
    {
        $especialida = factory(Especialida::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/especialidades/'.$especialida->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/especialidades/'.$especialida->id
        );

        $this->response->assertStatus(404);
    }
}
