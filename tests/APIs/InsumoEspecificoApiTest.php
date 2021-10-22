<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\InsumoEspecifico;

class InsumoEspecificoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_insumo_especifico()
    {
        $insumoEspecifico = factory(InsumoEspecifico::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/insumo_especificos', $insumoEspecifico
        );

        $this->assertApiResponse($insumoEspecifico);
    }

    /**
     * @test
     */
    public function test_read_insumo_especifico()
    {
        $insumoEspecifico = factory(InsumoEspecifico::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/insumo_especificos/'.$insumoEspecifico->id
        );

        $this->assertApiResponse($insumoEspecifico->toArray());
    }

    /**
     * @test
     */
    public function test_update_insumo_especifico()
    {
        $insumoEspecifico = factory(InsumoEspecifico::class)->create();
        $editedInsumoEspecifico = factory(InsumoEspecifico::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/insumo_especificos/'.$insumoEspecifico->id,
            $editedInsumoEspecifico
        );

        $this->assertApiResponse($editedInsumoEspecifico);
    }

    /**
     * @test
     */
    public function test_delete_insumo_especifico()
    {
        $insumoEspecifico = factory(InsumoEspecifico::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/insumo_especificos/'.$insumoEspecifico->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/insumo_especificos/'.$insumoEspecifico->id
        );

        $this->response->assertStatus(404);
    }
}
