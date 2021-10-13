<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pabellon;

class PabellonApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pabellon()
    {
        $pabellon = factory(Pabellon::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pabellones', $pabellon
        );

        $this->assertApiResponse($pabellon);
    }

    /**
     * @test
     */
    public function test_read_pabellon()
    {
        $pabellon = factory(Pabellon::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pabellones/'.$pabellon->id
        );

        $this->assertApiResponse($pabellon->toArray());
    }

    /**
     * @test
     */
    public function test_update_pabellon()
    {
        $pabellon = factory(Pabellon::class)->create();
        $editedPabellon = factory(Pabellon::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pabellones/'.$pabellon->id,
            $editedPabellon
        );

        $this->assertApiResponse($editedPabellon);
    }

    /**
     * @test
     */
    public function test_delete_pabellon()
    {
        $pabellon = factory(Pabellon::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pabellones/'.$pabellon->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pabellones/'.$pabellon->id
        );

        $this->response->assertStatus(404);
    }
}
