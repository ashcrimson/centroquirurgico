<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Parentesco;

class ParentescoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_parentesco()
    {
        $parentesco = factory(Parentesco::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/parentescos', $parentesco
        );

        $this->assertApiResponse($parentesco);
    }

    /**
     * @test
     */
    public function test_read_parentesco()
    {
        $parentesco = factory(Parentesco::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/parentescos/'.$parentesco->id
        );

        $this->assertApiResponse($parentesco->toArray());
    }

    /**
     * @test
     */
    public function test_update_parentesco()
    {
        $parentesco = factory(Parentesco::class)->create();
        $editedParentesco = factory(Parentesco::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/parentescos/'.$parentesco->id,
            $editedParentesco
        );

        $this->assertApiResponse($editedParentesco);
    }

    /**
     * @test
     */
    public function test_delete_parentesco()
    {
        $parentesco = factory(Parentesco::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/parentescos/'.$parentesco->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/parentescos/'.$parentesco->id
        );

        $this->response->assertStatus(404);
    }
}
