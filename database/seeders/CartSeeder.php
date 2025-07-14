<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::insert([
            [
                'session_id' => 'session1',
                'user_id'    => null,
            ],
            [
                'session_id' => 'session2',
                'user_id'    => null,
            ],
        ]);
    }
}
