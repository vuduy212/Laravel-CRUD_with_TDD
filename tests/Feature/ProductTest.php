<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function user_can_get_products()
    {
        $product = Product::factory()->create();
        $response = $this->get($this->getIndexRoute());
        $response->assertViewIs('products.index');
        $response->assertSee($product->name);
        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_get_detail_products()
    {
        $product = Product::factory()->create();
        $response = $this->get($this->getDetailRoute($product->id));
        $response->assertViewIs('products.show');
        $response->assertSee($product->name);
        $response->assertStatus(200);
    }

    public function getIndexRoute()
    {
        return route('products.index');
    }

    public function getDetailRoute(int $id)
    {
        return route('products.show', $id);
    }
}
