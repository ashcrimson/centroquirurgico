<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EspecialidadSub;

class EspecialidadSubApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_especialidad_sub()
    {
        $especialidadSub = factory(EspecialidadSub::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/especialidad_subs', $especialidadSub
        );

        $this->assertApiResponse($especialidadSub);
    }

    /**
     * @test
     */
    public function test_read_especialidad_sub()
    {
        $especialidadSub = factory(EspecialidadSub::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/especialidad_subs/'.$especialidadSub->id
        );

        $this->assertApiResponse($especialidadSub->toArray());
    }

    /**
     * @test
     */
    public function test_update_especialidad_sub()
    {
        $especialidadSub = factory(EspecialidadSub::class)->create();
        $editedEspecialidadSub = factory(EspecialidadSub::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/especialidad_subs/'.$especialidadSub->id,
            $editedEspecialidadSub
        );

        $this->assertApiResponse($editedEspecialidadSub);
    }

    /**
     * @test
     */
    public function test_delete_especialidad_sub()
    {
        $especialidadSub = factory(EspecialidadSub::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/especialidad_subs/'.$especialidadSub->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/especialidad_subs/'.$especialidadSub->id
        );

        $this->response->assertStatus(404);
    }
}
