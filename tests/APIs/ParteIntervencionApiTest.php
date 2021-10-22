<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParteIntervencion;

class ParteIntervencionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte_intervencion()
    {
        $parteIntervencion = factory(ParteIntervencion::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parte_intervencions', $parteIntervencion
        );

        $this->assertApiResponse($parteIntervencion);
    }

    /**
     * @test
     */
    public function test_read_parte_intervencion()
    {
        $parteIntervencion = factory(ParteIntervencion::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parte_intervencions/'.$parteIntervencion->id
        );

        $this->assertApiResponse($parteIntervencion->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte_intervencion()
    {
        $parteIntervencion = factory(ParteIntervencion::class)->create();
        $editedParteIntervencion = factory(ParteIntervencion::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parte_intervencions/'.$parteIntervencion->id,
            $editedParteIntervencion
        );

        $this->assertApiResponse($editedParteIntervencion);
    }

    /**
     * @test
     */
    public function test_delete_parte_intervencion()
    {
        $parteIntervencion = factory(ParteIntervencion::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parte_intervencions/'.$parteIntervencion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parte_intervencions/'.$parteIntervencion->id
        );

        $this->response->assertStatus(404);
    }
}
