<?php

namespace App\Domain\Products\Database\Seeders;

use App\Domain\Products\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'sku' => "000001",
            'name' => "Full coverage insurance",
            'category' => "insurance",
            'price' => 89000,
        ]);
        Product::create([
            'sku' => "000002",
            'name' => "Compact Car X3",
            'category' => "vehicle",
            'price' => 99000,
        ]);
        Product::create([
            'sku' => "000003",
            'name' => "SUV Vehicle, high end",
            'category' => "vehicle",
            'price' => 150000,
        ]);
        Product::create([
            'sku' => "000004",
            'name' => "Basic coverage",
            'category' => "insurance",
            'price' => 20000,
        ]);
        Product::create([
            'sku' => "000005",
            'name' => "Convertible X2, Electric",
            'category' => "vehicle",
            'price' => 250000,
        ]);
    }
}
