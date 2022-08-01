<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParteHistorico;

class ParteHistoricoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte_historico()
    {
        $parteHistorico = factory(ParteHistorico::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parte_historicos', $parteHistorico
        );

        $this->assertApiResponse($parteHistorico);
    }

    /**
     * @test
     */
    public function test_read_parte_historico()
    {
        $parteHistorico = factory(ParteHistorico::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parte_historicos/'.$parteHistorico->id
        );

        $this->assertApiResponse($parteHistorico->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte_historico()
    {
        $parteHistorico = factory(ParteHistorico::class)->create();
        $editedParteHistorico = factory(ParteHistorico::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parte_historicos/'.$parteHistorico->id,
            $editedParteHistorico
        );

        $this->assertApiResponse($editedParteHistorico);
    }

    /**
     * @test
     */
    public function test_delete_parte_historico()
    {
        $parteHistorico = factory(ParteHistorico::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parte_historicos/'.$parteHistorico->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parte_historicos/'.$parteHistorico->id
        );

        $this->response->assertStatus(404);
    }
}
