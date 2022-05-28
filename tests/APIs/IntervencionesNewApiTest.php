<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\IntervencionesNew;

class IntervencionesNewApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_intervenciones_new()
    {
        $intervencionesNew = factory(IntervencionesNew::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/intervenciones_news', $intervencionesNew
        );

        $this->assertApiResponse($intervencionesNew);
    }

    /**
     * @test
     */
    public function test_read_intervenciones_new()
    {
        $intervencionesNew = factory(IntervencionesNew::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/intervenciones_news/'.$intervencionesNew->id
        );

        $this->assertApiResponse($intervencionesNew->toArray());
    }

    /**
     * @test
     */
    public function test_update_intervenciones_new()
    {
        $intervencionesNew = factory(IntervencionesNew::class)->create();
        $editedIntervencionesNew = factory(IntervencionesNew::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/intervenciones_news/'.$intervencionesNew->id,
            $editedIntervencionesNew
        );

        $this->assertApiResponse($editedIntervencionesNew);
    }

    /**
     * @test
     */
    public function test_delete_intervenciones_new()
    {
        $intervencionesNew = factory(IntervencionesNew::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/intervenciones_news/'.$intervencionesNew->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/intervenciones_news/'.$intervencionesNew->id
        );

        $this->response->assertStatus(404);
    }
}
