<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Convenio;

class ConvenioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_convenio()
    {
        $convenio = factory(Convenio::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/convenios', $convenio
        );

        $this->assertApiResponse($convenio);
    }

    /**
     * @test
     */
    public function test_read_convenio()
    {
        $convenio = factory(Convenio::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/convenios/'.$convenio->id
        );

        $this->assertApiResponse($convenio->toArray());
    }

    /**
     * @test
     */
    public function test_update_convenio()
    {
        $convenio = factory(Convenio::class)->create();
        $editedConvenio = factory(Convenio::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/convenios/'.$convenio->id,
            $editedConvenio
        );

        $this->assertApiResponse($editedConvenio);
    }

    /**
     * @test
     */
    public function test_delete_convenio()
    {
        $convenio = factory(Convenio::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/convenios/'.$convenio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/convenios/'.$convenio->id
        );

        $this->response->assertStatus(404);
    }
}
