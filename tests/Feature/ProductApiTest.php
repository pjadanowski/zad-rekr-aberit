<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use PHPUnit\Framework\Attributes\Test;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    #[Test]
    public function it_can_list_products()
    {
        $response = $this->getJson('/api/products');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'slug', 'description', 'price', 'category']
                ]
            ]);
    }

    #[Test]
    public function it_can_show_product()
    {
        $product = Product::first();

        $response = $this->getJson('/api/products/' . $product->id);
        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $product->id]);
    }

    #[Test]
    public function it_can_create_product()
    {
        $category = Category::first();
        $payload = [
            'name' => 'Test Product',
            'slug' => 'test-product',
            'description' => 'desc',
            'price' => 1234,
            'category_id' => $category->id,
        ];

        $response = $this->postJson('/api/products', $payload);
        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Test Product']);
        $this->assertDatabaseHas('products', ['slug' => 'test-product']);
    }

    #[Test]
    public function it_can_update_product()
    {
        $product = Product::first();
        $payload = ['name' => 'Updated'];

        $response = $this->putJson('/api/products/' . $product->id, $payload);
        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Updated']);
    }

    #[Test]
    public function it_can_delete_product()
    {
        $product = Product::first();

        $response = $this->deleteJson('/api/products/' . $product->id);
        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Product deleted']);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
