<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Examen;

class ExamenApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_examen()
    {
        $examen = factory(Examen::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/examens', $examen
        );

        $this->assertApiResponse($examen);
    }

    /**
     * @test
     */
    public function test_read_examen()
    {
        $examen = factory(Examen::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/examens/'.$examen->id
        );

        $this->assertApiResponse($examen->toArray());
    }

    /**
     * @test
     */
    public function test_update_examen()
    {
        $examen = factory(Examen::class)->create();
        $editedExamen = factory(Examen::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/examens/'.$examen->id,
            $editedExamen
        );

        $this->assertApiResponse($editedExamen);
    }

    /**
     * @test
     */
    public function test_delete_examen()
    {
        $examen = factory(Examen::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/examens/'.$examen->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/examens/'.$examen->id
        );

        $this->response->assertStatus(404);
    }
}
