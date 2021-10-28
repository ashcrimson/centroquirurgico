<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParteDiagnostico;

class ParteDiagnosticoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parte_diagnostico()
    {
        $parteDiagnostico = factory(ParteDiagnostico::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parte_diagnosticos', $parteDiagnostico
        );

        $this->assertApiResponse($parteDiagnostico);
    }

    /**
     * @test
     */
    public function test_read_parte_diagnostico()
    {
        $parteDiagnostico = factory(ParteDiagnostico::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parte_diagnosticos/'.$parteDiagnostico->id
        );

        $this->assertApiResponse($parteDiagnostico->toArray());
    }

    /**
     * @test
     */
    public function test_update_parte_diagnostico()
    {
        $parteDiagnostico = factory(ParteDiagnostico::class)->create();
        $editedParteDiagnostico = factory(ParteDiagnostico::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parte_diagnosticos/'.$parteDiagnostico->id,
            $editedParteDiagnostico
        );

        $this->assertApiResponse($editedParteDiagnostico);
    }

    /**
     * @test
     */
    public function test_delete_parte_diagnostico()
    {
        $parteDiagnostico = factory(ParteDiagnostico::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parte_diagnosticos/'.$parteDiagnostico->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parte_diagnosticos/'.$parteDiagnostico->id
        );

        $this->response->assertStatus(404);
    }
}
