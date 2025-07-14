<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart1 = Cart::where('session_id', 'session1')->first();
        $cart2 = Cart::where('session_id', 'session2')->first();

        $product1 = Product::where('slug', 'smartphone')->first();
        $product2 = Product::where('slug', 'macbook')->first();
        $product3 = Product::where('slug', 't-shirt')->first();

        \App\Models\CartItem::insert([
            [
                'cart_id'     => $cart1?->id,
                'product_id'  => $product1?->id,
                'quantity'    => 1,
                'unit_price'  => 29999,
                'total_price' => 29999,
            ],
            [
                'cart_id'     => $cart1?->id,
                'product_id'  => $product2?->id,
                'quantity'    => 2,
                'unit_price'  => 4999,
                'total_price' => 9998,
            ],
            [
                'cart_id'     => $cart2?->id,
                'product_id'  => $product3?->id,
                'quantity'    => 3,
                'unit_price'  => 1999,
                'total_price' => 5997,
            ],
        ]);
    }
}
