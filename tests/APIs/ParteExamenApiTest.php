<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParteExamen;

class ParteExamenApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte_examen()
    {
        $parteExamen = factory(ParteExamen::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parte_examens', $parteExamen
        );

        $this->assertApiResponse($parteExamen);
    }

    /**
     * @test
     */
    public function test_read_parte_examen()
    {
        $parteExamen = factory(ParteExamen::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parte_examens/'.$parteExamen->id
        );

        $this->assertApiResponse($parteExamen->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte_examen()
    {
        $parteExamen = factory(ParteExamen::class)->create();
        $editedParteExamen = factory(ParteExamen::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parte_examens/'.$parteExamen->id,
            $editedParteExamen
        );

        $this->assertApiResponse($editedParteExamen);
    }

    /**
     * @test
     */
    public function test_delete_parte_examen()
    {
        $parteExamen = factory(ParteExamen::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parte_examens/'.$parteExamen->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parte_examens/'.$parteExamen->id
        );

        $this->response->assertStatus(404);
    }
}
