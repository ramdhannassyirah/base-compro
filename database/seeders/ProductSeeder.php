<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Meja',
            'price' => 1000000,
            'description' => '',
            'slug' => 'meja',
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Kursi',
            'price' => 500000,
            'description' => '',
            'slug' => 'kursi',
            'category_id' => 2
        ]);
        Product::create([
            'name' => 'Meja 2',
            'price' => 1500000,
            'description' => '',
            'slug' => 'meja-2',
            'category_id' => 1,
        ]);
        Product::create([
            'name' => 'Kursi 2',
            'price' => 1000000,
            'description' => '',
            'slug' => 'kursi-2',
            'category_id' => 2
        ]);
          Product::create([
            'name' => 'Meja 3',
            'price' => 2000000,
            'description' => '',
            'slug' => 'meja-3',
            'category_id' => 1,
        ]);
    }
}