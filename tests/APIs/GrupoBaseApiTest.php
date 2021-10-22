<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\GrupoBase;

class GrupoBaseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_grupo_base()
    {
        $grupoBase = factory(GrupoBase::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/grupo_bases', $grupoBase
        );

        $this->assertApiResponse($grupoBase);
    }

    /**
     * @test
     */
    public function test_read_grupo_base()
    {
        $grupoBase = factory(GrupoBase::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/grupo_bases/'.$grupoBase->id
        );

        $this->assertApiResponse($grupoBase->toArray());
    }

    /**
     * @test
     */
    public function test_update_grupo_base()
    {
        $grupoBase = factory(GrupoBase::class)->create();
        $editedGrupoBase = factory(GrupoBase::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/grupo_bases/'.$grupoBase->id,
            $editedGrupoBase
        );

        $this->assertApiResponse($editedGrupoBase);
    }

    /**
     * @test
     */
    public function test_delete_grupo_base()
    {
        $grupoBase = factory(GrupoBase::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/grupo_bases/'.$grupoBase->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/grupo_bases/'.$grupoBase->id
        );

        $this->response->assertStatus(404);
    }
}
