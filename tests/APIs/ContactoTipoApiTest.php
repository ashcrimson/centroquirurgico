<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContactoTipo;

class ContactoTipoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contacto_tipo()
    {
        $contactoTipo = factory(ContactoTipo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contacto_tipos', $contactoTipo
        );

        $this->assertApiResponse($contactoTipo);
    }

    /**
     * @test
     */
    public function test_read_contacto_tipo()
    {
        $contactoTipo = factory(ContactoTipo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contacto_tipos/'.$contactoTipo->id
        );

        $this->assertApiResponse($contactoTipo->toArray());
    }

    /**
     * @test
     */
    public function test_update_contacto_tipo()
    {
        $contactoTipo = factory(ContactoTipo::class)->create();
        $editedContactoTipo = factory(ContactoTipo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contacto_tipos/'.$contactoTipo->id,
            $editedContactoTipo
        );

        $this->assertApiResponse($editedContactoTipo);
    }

    /**
     * @test
     */
    public function test_delete_contacto_tipo()
    {
        $contactoTipo = factory(ContactoTipo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contacto_tipos/'.$contactoTipo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contacto_tipos/'.$contactoTipo->id
        );

        $this->response->assertStatus(404);
    }
}
