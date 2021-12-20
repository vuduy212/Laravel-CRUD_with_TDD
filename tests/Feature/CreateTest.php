<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /** @test */
    public function authen_user_can_view_form_create()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get($this->getCreateRoute());
        $response->assertViewIs('products.create');
        $response->assertStatus(200);
    }

    /** @test */
    public function unauthen_user_cannot_view_form_create()
    {
        $response = $this->get($this->getCreateRoute());
        $response->assertRedirect('/login');
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /** @test */
    public function authen_user_can_create_product()
    {
        $this->actingAs(User::factory()->create());
        $product = Product::factory()->create();
        $response = $this->post($this->getStoreRoute(), $product->toArray());
        $response->assertRedirect(route('products.index'));
        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function getCreateRoute()
    {
        return route('products.create');
    }

    public function getStoreRoute()
    {
        return route('products.store');
    }
}
