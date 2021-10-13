<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CirugiaTipo;

class CirugiaTipoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cirugia_tipo()
    {
        $cirugiaTipo = factory(CirugiaTipo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cirugia_tipos', $cirugiaTipo
        );

        $this->assertApiResponse($cirugiaTipo);
    }

    /**
     * @test
     */
    public function test_read_cirugia_tipo()
    {
        $cirugiaTipo = factory(CirugiaTipo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/cirugia_tipos/'.$cirugiaTipo->id
        );

        $this->assertApiResponse($cirugiaTipo->toArray());
    }

    /**
     * @test
     */
    public function test_update_cirugia_tipo()
    {
        $cirugiaTipo = factory(CirugiaTipo::class)->create();
        $editedCirugiaTipo = factory(CirugiaTipo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cirugia_tipos/'.$cirugiaTipo->id,
            $editedCirugiaTipo
        );

        $this->assertApiResponse($editedCirugiaTipo);
    }

    /**
     * @test
     */
    public function test_delete_cirugia_tipo()
    {
        $cirugiaTipo = factory(CirugiaTipo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cirugia_tipos/'.$cirugiaTipo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cirugia_tipos/'.$cirugiaTipo->id
        );

        $this->response->assertStatus(404);
    }
}
