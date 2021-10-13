<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Parte;

class ParteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte()
    {
        $parte = factory(Parte::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/partes', $parte
        );

        $this->assertApiResponse($parte);
    }

    /**
     * @test
     */
    public function test_read_parte()
    {
        $parte = factory(Parte::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/partes/'.$parte->id
        );

        $this->assertApiResponse($parte->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte()
    {
        $parte = factory(Parte::class)->create();
        $editedParte = factory(Parte::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/partes/'.$parte->id,
            $editedParte
        );

        $this->assertApiResponse($editedParte);
    }

    /**
     * @test
     */
    public function test_delete_parte()
    {
        $parte = factory(Parte::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/partes/'.$parte->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/partes/'.$parte->id
        );

        $this->response->assertStatus(404);
    }
}
