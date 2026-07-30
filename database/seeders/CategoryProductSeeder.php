<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Categories
        $categoriesData = [
            [
                'name' => 'Electronics',
                'description' => 'Gadgets, devices, and computer hardware accessories.',
                'status' => true,
            ],
            [
                'name' => 'Clothing & Apparel',
                'description' => 'Modern lifestyle apparel, shoes, and clothing accessories.',
                'status' => true,
            ],
            [
                'name' => 'Books & Media',
                'description' => 'Educational material, textbooks, fiction, and journals.',
                'status' => true,
            ],
            [
                'name' => 'Home & Furniture',
                'description' => 'Sleek furniture, lighting fixtures, and decor pieces.',
                'status' => true,
            ],
            [
                'name' => 'Fitness & Outdoors',
                'description' => 'Sports equipment, workout accessories, and outdoor gear.',
                'status' => true,
            ],
            [
                'name' => 'Inactive Temp Category',
                'description' => 'A temporary category that is currently set to inactive.',
                'status' => false,
            ]
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['name']] = Category::create($cat);
        }

        // 2. Seed Products
        $productsData = [
            // Electronics Products
            [
                'category_id' => $categories['Electronics']->id,
                'name' => 'Wireless Mechanical Keyboard',
                'sku' => 'ELEC-KEY-001',
                'description' => 'Premium hot-swappable mechanical keyboard with RGB backlighting.',
                'price' => 89.99,
                'stock_quantity' => 15,
                'status' => true,
            ],
            [
                'category_id' => $categories['Electronics']->id,
                'name' => 'USB-C Charging Hub',
                'sku' => 'ELEC-HUB-002',
                'description' => 'Multi-port USB-C adapter with HDMI output and power delivery.',
                'price' => 34.99,
                'stock_quantity' => 8, // Low Stock (< 10)
                'status' => true,
            ],
            [
                'category_id' => $categories['Electronics']->id,
                'name' => 'Noise Cancelling Headphones',
                'sku' => 'ELEC-HD-003',
                'description' => 'Bluetooth headphones with premium active noise cancellation.',
                'price' => 199.99,
                'stock_quantity' => 0, // Out of Stock (= 0)
                'status' => true,
            ],

            // Clothing Products
            [
                'category_id' => $categories['Clothing & Apparel']->id,
                'name' => 'Premium Cotton Hoodie',
                'sku' => 'APPA-HD-001',
                'description' => 'Unisex oversized heavy cotton blend hoodie with front pouch.',
                'price' => 45.00,
                'stock_quantity' => 25,
                'status' => true,
            ],
            [
                'category_id' => $categories['Clothing & Apparel']->id,
                'name' => 'Waterproof Windbreaker Jacket',
                'sku' => 'APPA-WIND-002',
                'description' => 'Lightweight travel windbreaker with utility zip pockets.',
                'price' => 59.99,
                'stock_quantity' => 5, // Low Stock (< 10)
                'status' => true,
            ],
            [
                'category_id' => $categories['Clothing & Apparel']->id,
                'name' => 'Denim Fitted Jeans',
                'sku' => 'APPA-JEAN-003',
                'description' => 'Classic slim-fit stretch denim trousers.',
                'price' => 39.50,
                'stock_quantity' => 0, // Out of Stock (= 0)
                'status' => false, // Inactive
            ],

            // Books Products
            [
                'category_id' => $categories['Books & Media']->id,
                'name' => 'Design Systems Handbook',
                'sku' => 'BOOK-DS-001',
                'description' => 'A comprehensive guide to constructing scalable digital design systems.',
                'price' => 29.99,
                'stock_quantity' => 40,
                'status' => true,
            ],
            [
                'category_id' => $categories['Books & Media']->id,
                'name' => 'Learning Laravel & Eloquent',
                'sku' => 'BOOK-LV-002',
                'description' => 'Step-by-step tutorial book on modern Laravel application patterns.',
                'price' => 49.99,
                'stock_quantity' => 3, // Low Stock (< 10)
                'status' => true,
            ],

            // Home & Furniture Products
            [
                'category_id' => $categories['Home & Furniture']->id,
                'name' => 'Minimalist Wooden Desk Lamp',
                'sku' => 'HOME-LAMP-001',
                'description' => 'Adjustable wooden table lamp with warm LED bulb.',
                'price' => 24.99,
                'stock_quantity' => 12,
                'status' => true,
            ],
            [
                'category_id' => $categories['Home & Furniture']->id,
                'name' => 'Ergonomic Mesh Office Chair',
                'sku' => 'HOME-CHR-002',
                'description' => 'Comfortable high-back desk chair with lumbar support.',
                'price' => 149.00,
                'stock_quantity' => 9, // Low Stock (< 10)
                'status' => true,
            ],

            // Fitness Products
            [
                'category_id' => $categories['Fitness & Outdoors']->id,
                'name' => 'Adjustable Dumbbell Set',
                'sku' => 'FIT-DUMB-001',
                'description' => 'Compact adjustable weight selection plates.',
                'price' => 129.99,
                'stock_quantity' => 2, // Low Stock (< 10)
                'status' => true,
            ],
            [
                'category_id' => $categories['Fitness & Outdoors']->id,
                'name' => 'Stainless Steel Insulated Bottle',
                'sku' => 'FIT-BOT-002',
                'description' => 'Double-walled thermal flask for cold/hot liquids.',
                'price' => 19.99,
                'stock_quantity' => 0, // Out of Stock (= 0)
                'status' => true,
            ]
        ];

        foreach ($productsData as $prod) {
            Product::create($prod);
        }
    }
}
