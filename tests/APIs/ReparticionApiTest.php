<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Reparticion;

class ReparticionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_reparticion()
    {
        $reparticion = factory(Reparticion::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/reparticions', $reparticion
        );

        $this->assertApiResponse($reparticion);
    }

    /**
     * @test
     */
    public function test_read_reparticion()
    {
        $reparticion = factory(Reparticion::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/reparticions/'.$reparticion->id
        );

        $this->assertApiResponse($reparticion->toArray());
    }

    /**
     * @test
     */
    public function test_update_reparticion()
    {
        $reparticion = factory(Reparticion::class)->create();
        $editedReparticion = factory(Reparticion::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/reparticions/'.$reparticion->id,
            $editedReparticion
        );

        $this->assertApiResponse($editedReparticion);
    }

    /**
     * @test
     */
    public function test_delete_reparticion()
    {
        $reparticion = factory(Reparticion::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/reparticions/'.$reparticion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/reparticions/'.$reparticion->id
        );

        $this->response->assertStatus(404);
    }
}
