<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Intervencion;

class IntervencionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_intervencion()
    {
        $intervencion = factory(Intervencion::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/intervencions', $intervencion
        );

        $this->assertApiResponse($intervencion);
    }

    /**
     * @test
     */
    public function test_read_intervencion()
    {
        $intervencion = factory(Intervencion::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/intervencions/'.$intervencion->id
        );

        $this->assertApiResponse($intervencion->toArray());
    }

    /**
     * @test
     */
    public function test_update_intervencion()
    {
        $intervencion = factory(Intervencion::class)->create();
        $editedIntervencion = factory(Intervencion::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/intervencions/'.$intervencion->id,
            $editedIntervencion
        );

        $this->assertApiResponse($editedIntervencion);
    }

    /**
     * @test
     */
    public function test_delete_intervencion()
    {
        $intervencion = factory(Intervencion::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/intervencions/'.$intervencion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/intervencions/'.$intervencion->id
        );

        $this->response->assertStatus(404);
    }
}
