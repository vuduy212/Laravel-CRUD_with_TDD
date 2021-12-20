<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    /** @test */
    public function authen_user_can_delete()
    {
        $this->actingAs(User::factory()->create());
        $product = Product::factory()->create();
        $response = $this->delete($this->getDeleteRoute($product->id));
        $this->assertDatabaseMissing('product', $product->toArray());
        $response->assertRedirect(route('products.index'));
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function unauthen_user_cannot_delete()
    {
        $product = Product::factory()->create();
        $response = $this->delete($this->getDeleteRoute($product->id));
        $response->assertRedirect('/login');
        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function getDeleteRoute(int $id)
    {
        return route('products.delete', $id);
    }
}
