<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([

            [
                'name' => 'Glass Slipper',
                'price' => 5000,
                'description' => 'Crystal shiny slipper.',
                'image' => 'shoe1.jpg',
            ],
            [
                'name' => 'Royal Heels',
                'price' => 7500,
                'description' => 'Luxury stylish heels.',
                'image' => 'shoe2.jpg',
            ],
            [
                'name' => 'Evening Gown',
                'price' => 15000,
                'description' => 'Premium evening wear.',
                'image' => 'dress2.jpg',
            ],
            [
                'name' => 'Matte Lipstick',
                'price' => 1500,
                'description' => 'Long-lasting matte lipstick with smooth finish.',
                'image' => 'lipstick.jpg',
            ],
            [
                'name' => 'Liquid Foundation',
                'price' => 3200,
                'description' => 'Full coverage liquid foundation for flawless skin.',
                'image' => 'foundation.jpg',
            ],
            [
                'name' => 'Eye Shadow Palette',
                'price' => 2800,
                'description' => 'Multi-color eyeshadow palette for stunning looks.',
                'image' => 'eyeshadow.jpg',
            ],
            [
                'name' => 'Mascara',
                'price' => 1800,
                'description' => 'Waterproof mascara for long and thick lashes.',
                'image' => 'mascara.jpg',
            ],
            [
                'name' => 'Face Powder',
                'price' => 1200,
                'description' => 'Lightweight face powder for natural glow.',
                'image' => 'powder.jpg',
            ],
            [
                'name' => 'Blush Kit',
                'price' => 2000,
                'description' => 'Soft blush kit for a rosy and fresh look.',
                'image' => 'blush.jpg',
            ],
            [
                'name' => 'Makeup Brush Set',
                'price' => 3500,
                'description' => 'Professional makeup brushes for perfect application.',
                'image' => 'brush.jpg',
            ],

        ]);
    }
}