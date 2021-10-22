<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParteContacto;

class ParteContactoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte_contacto()
    {
        $parteContacto = factory(ParteContacto::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parte_contactos', $parteContacto
        );

        $this->assertApiResponse($parteContacto);
    }

    /**
     * @test
     */
    public function test_read_parte_contacto()
    {
        $parteContacto = factory(ParteContacto::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parte_contactos/'.$parteContacto->id
        );

        $this->assertApiResponse($parteContacto->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte_contacto()
    {
        $parteContacto = factory(ParteContacto::class)->create();
        $editedParteContacto = factory(ParteContacto::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parte_contactos/'.$parteContacto->id,
            $editedParteContacto
        );

        $this->assertApiResponse($editedParteContacto);
    }

    /**
     * @test
     */
    public function test_delete_parte_contacto()
    {
        $parteContacto = factory(ParteContacto::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parte_contactos/'.$parteContacto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parte_contactos/'.$parteContacto->id
        );

        $this->response->assertStatus(404);
    }
}
