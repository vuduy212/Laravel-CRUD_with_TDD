<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    /** @test */
    public function authen_user_can_view_form_update()
    {
        $this->actingAs(User::factory()->create());
        $product = Product::factory()->create();
        $response = $this->get($this->getEditRoute($product->id));
        $response->assertViewIs('products.edit');
        $response->assertSee($product->name);
        $response->assertStatus(200);
    }

    /** @test */
    public function unauthen_user_cannot_view_form_update()
    {
        $product = Product::factory()->create();
        $response = $this->get($this->getEditRoute($product->id));
        $response->assertRedirect('/login');
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function authen_user_can_update()
    {
        $this->actingAs(User::factory()->create());
        $product = Product::factory()->create();
        $product['name'] = 'Name (updated)';
        $response = $this->put($this->getUpdateRoute($product->id), $product->toArray());
        $this->assertDatabaseHas('product', ['id' => $product->id, 'name' => 'Name (updated)']);
        $response->assertRedirect(route('products.index'));
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function unauthen_user_cannot_update()
    {
        $product = Product::factory()->create();
        $product['name'] = 'Name (updated)';
        $response = $this->put($this->getUpdateRoute($product->id), $product->toArray());
        $response->assertRedirect('/login');
        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function getEditRoute(int $id)
    {
        return route('products.edit', $id);
    }

    public function getUpdateRoute(int $id)
    {
        return route('products.update', $id);
    }
}
