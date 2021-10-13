<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Preoperatorio;

class PreoperatorioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_preoperatorio()
    {
        $preoperatorio = factory(Preoperatorio::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/preoperatorios', $preoperatorio
        );

        $this->assertApiResponse($preoperatorio);
    }

    /**
     * @test
     */
    public function test_read_preoperatorio()
    {
        $preoperatorio = factory(Preoperatorio::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/preoperatorios/'.$preoperatorio->id
        );

        $this->assertApiResponse($preoperatorio->toArray());
    }

    /**
     * @test
     */
    public function test_update_preoperatorio()
    {
        $preoperatorio = factory(Preoperatorio::class)->create();
        $editedPreoperatorio = factory(Preoperatorio::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/preoperatorios/'.$preoperatorio->id,
            $editedPreoperatorio
        );

        $this->assertApiResponse($editedPreoperatorio);
    }

    /**
     * @test
     */
    public function test_delete_preoperatorio()
    {
        $preoperatorio = factory(Preoperatorio::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/preoperatorios/'.$preoperatorio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/preoperatorios/'.$preoperatorio->id
        );

        $this->response->assertStatus(404);
    }
}
