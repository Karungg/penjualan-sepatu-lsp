<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [];

        for ($i = 1; $i <= 5; $i++) {
            $products[] = [
                'id' => $i,
                'title' => 'Nike ' . $i,
                'description' => 'Sepatu running',
                'color' => 'Hitam',
                'stock' => 100,
                'price' => 2000000,
                'image' =>  'assets/images/nike-' . $i . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
