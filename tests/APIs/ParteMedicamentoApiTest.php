<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParteMedicamento;

class ParteMedicamentoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte_medicamento()
    {
        $parteMedicamento = factory(ParteMedicamento::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parte_medicamentos', $parteMedicamento
        );

        $this->assertApiResponse($parteMedicamento);
    }

    /**
     * @test
     */
    public function test_read_parte_medicamento()
    {
        $parteMedicamento = factory(ParteMedicamento::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parte_medicamentos/'.$parteMedicamento->id
        );

        $this->assertApiResponse($parteMedicamento->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte_medicamento()
    {
        $parteMedicamento = factory(ParteMedicamento::class)->create();
        $editedParteMedicamento = factory(ParteMedicamento::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parte_medicamentos/'.$parteMedicamento->id,
            $editedParteMedicamento
        );

        $this->assertApiResponse($editedParteMedicamento);
    }

    /**
     * @test
     */
    public function test_delete_parte_medicamento()
    {
        $parteMedicamento = factory(ParteMedicamento::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parte_medicamentos/'.$parteMedicamento->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parte_medicamentos/'.$parteMedicamento->id
        );

        $this->response->assertStatus(404);
    }
}
