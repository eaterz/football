<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Users
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'role' => 'user'
        ]);

        // Create Categories
        $categories = [
            [
                'name' => 'Football boots',
                'image' => 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/featured/boots/nike/ftab-nike-voltage-101024.jpg',
            ],
            [
                'name' => 'Football',
                'image' => 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/list-page-titles---new/teamwear/lpa-admiral-footballs.jpg',
            ],
            [
                'name' => 'Shin pads',
                'image' => 'https://shopjoga.com/cdn/shop/files/Untitleddesign_1_1.png?v=1726366735&width=533',
            ],
            [
                'name' => 'Base layer',
                'image' => 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/featured/fitness/ftab-ote-baselayer-ua-1.jpg',
            ],
            [
                'name' => 'Football wear',
                'image' => 'https://www.lovellsoccer.co.uk/features/splash-pages/soccer/clothing/trainingtop-aug24.jpg',
            ]
        ];

        // Products organized by category
        $categoryProducts = [
            'Football boots' => [
                [
                    'name' => 'Nike Mercurial Vapor 15 Elite',
                    'description' => 'A lightweight football boot designed for speed and agility.',
                    'price' => 279.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/116093/600/nike-mercurial-vapor-15-elite-new-lights-fg.jpg',
                ],
                [
                    'name' => 'Adidas X Crazyfast.1',
                    'description' => 'Sleek and stylish, this boot helps you reach new heights.',
                    'price' => 249.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/115853/600/adidas-x-crazyfast.1-fg.jpg',
                ],
                [
                    'name' => 'Puma Future Ultimate',
                    'description' => 'Dynamic fit for seamless movement on the pitch.',
                    'price' => 239.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/116046/600/puma-future-ultimate-fg-ag.jpg',
                ],
            ],
            'Football' => [
                [
                    'name' => 'Nike Flight Premier League',
                    'description' => 'Official Premier League match ball with AerowSculpt technology.',
                    'price' => 139.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/105052/600/nike-premier-league-flight-club-match-ball-2023-24.jpg',
                ],
                [
                    'name' => 'Adidas UCL Pro Ball',
                    'description' => 'Official UEFA Champions League match ball.',
                    'price' => 149.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/115043/600/adidas-champions-league-2024-pro-match-ball.jpg',
                ],
                [
                    'name' => 'Puma Orbita Serie A',
                    'description' => 'Official Serie A match ball with unique tracking system.',
                    'price' => 129.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/115304/600/puma-serie-a-orbita-winter-match-ball-2023-24.jpg',
                ],
            ],
            'Shin pads' => [
                [
                    'name' => 'Nike Mercurial Lite',
                    'description' => 'Lightweight shin guards with secure fit system.',
                    'price' => 24.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/111351/600/nike-mercurial-lite-grid.jpg',
                ],
                [
                    'name' => 'Adidas X Pro',
                    'description' => 'Professional grade shin guards with ankle protection.',
                    'price' => 29.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/111773/600/adidas-tiro-league-shin-guards.jpg',
                ],
                [
                    'name' => 'Puma Ultra Light',
                    'description' => 'Ultra-lightweight shin guards for maximum mobility.',
                    'price' => 19.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/111775/600/puma-standalone-shin-guards.jpg',
                ],
            ],
            'Base layer' => [
                [
                    'name' => 'Nike Pro Dri-FIT',
                    'description' => 'Compression base layer with moisture-wicking technology.',
                    'price' => 34.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/102563/600/nike-pro-long-sleeve-compression-top.jpg',
                ],
                [
                    'name' => 'Adidas Techfit',
                    'description' => 'Long sleeve compression shirt with climacool technology.',
                    'price' => 39.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/102565/600/adidas-techfit-compression-long-sleeve.jpg',
                ],
                [
                    'name' => 'Nike Pro Tights',
                    'description' => 'Compression tights with strategic ventilation.',
                    'price' => 29.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/102567/600/nike-pro-compression-tights.jpg',
                ],
            ],
            'Football wear' => [
                [
                    'name' => 'Nike Dri-FIT Academy',
                    'description' => 'Professional training jersey with breathable fabric.',
                    'price' => 44.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/115752/600/nike-dri-fit-academy-drill-top.jpg',
                ],
                [
                    'name' => 'Adidas Tiro Training',
                    'description' => 'Training pants with zippered ankles.',
                    'price' => 49.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/115167/600/adidas-tiro-23-track-pants.jpg',
                ],
                [
                    'name' => 'Nike Academy Pro',
                    'description' => 'Quarter-zip training top with moisture management.',
                    'price' => 54.99,
                    'image' => 'https://www.unisportstore.com/images/related_product/115753/600/nike-park-20-knit-track-jacket.jpg',
                ],
            ],
        ];

        // Create Categories and Products
        foreach ($categories as $categoryData) {
            $category = Category::factory()->create($categoryData);

            // Get products for this category
            $products = $categoryProducts[$category->name] ?? [];

            // Create products for this category
            foreach ($products as $productData) {
                Product::create(array_merge($productData, ['category_id' => $category->id]));
            }
        }
    }
}
