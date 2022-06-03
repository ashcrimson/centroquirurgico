<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParteInsumoEspecifico;

class ParteInsumoEspecificoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte_insumo_especifico()
    {
        $parteInsumoEspecifico = factory(ParteInsumoEspecifico::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parte_insumo_especificos', $parteInsumoEspecifico
        );

        $this->assertApiResponse($parteInsumoEspecifico);
    }

    /**
     * @test
     */
    public function test_read_parte_insumo_especifico()
    {
        $parteInsumoEspecifico = factory(ParteInsumoEspecifico::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parte_insumo_especificos/'.$parteInsumoEspecifico->id
        );

        $this->assertApiResponse($parteInsumoEspecifico->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte_insumo_especifico()
    {
        $parteInsumoEspecifico = factory(ParteInsumoEspecifico::class)->create();
        $editedParteInsumoEspecifico = factory(ParteInsumoEspecifico::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parte_insumo_especificos/'.$parteInsumoEspecifico->id,
            $editedParteInsumoEspecifico
        );

        $this->assertApiResponse($editedParteInsumoEspecifico);
    }

    /**
     * @test
     */
    public function test_delete_parte_insumo_especifico()
    {
        $parteInsumoEspecifico = factory(ParteInsumoEspecifico::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parte_insumo_especificos/'.$parteInsumoEspecifico->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parte_insumo_especificos/'.$parteInsumoEspecifico->id
        );

        $this->response->assertStatus(404);
    }
}
