<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('slug');

        $products = [
            [
                'name' => 'Handwoven Traditional Bag',
                'description' => 'Beautiful handwoven bag made by local artisans using traditional techniques. Perfect for daily use or as a unique gift.',
                'price' => 15000,
                'original_price' => 18000,
                'image' => 'assets/img/gift-shop/IMG-2.webp',
                'category_id' => $categories['bags']->id,
                'badge' => 'Popular',
                'entrepreneur' => 'Grace Mwale',
                'stock_quantity' => 25,
                'featured' => true,
            ],
            [
                'name' => 'Pure Organic Honey',
                'description' => '100% pure organic honey harvested from local beekeepers. Rich in natural nutrients and perfect for health-conscious consumers.',
                'price' => 8000,
                'image' => 'assets/img/gift-shop/IMG-3.webp',
                'category_id' => $categories['honey']->id,
                'badge' => 'Organic',
                'entrepreneur' => 'John Banda',
                'stock_quantity' => 50,
                'featured' => true,
            ],
            [
                'name' => 'Ceramic Flower Pot',
                'description' => 'Handcrafted ceramic flower pot with traditional Malawian designs. Perfect for indoor and outdoor plants.',
                'price' => 5500,
                'original_price' => 7000,
                'image' => 'assets/img/gift-shop/IMG-4.webp',
                'category_id' => $categories['pottery']->id,
                'badge' => 'Sale',
                'entrepreneur' => 'Mary Phiri',
                'stock_quantity' => 30,
            ],
            [
                'name' => 'Natural Body Scrub',
                'description' => 'Natural body scrub made from local ingredients. Exfoliates and moisturizes your skin naturally.',
                'price' => 3500,
                'image' => 'assets/img/gift-shop/IMG-5.webp',
                'category_id' => $categories['beauty']->id,
                'badge' => 'New',
                'entrepreneur' => 'Sarah Tembo',
                'stock_quantity' => 40,
            ],
            [
                'name' => 'Artisan Portrait Frame',
                'description' => 'Beautifully crafted wooden portrait frame with intricate carvings. Showcase your memories in style.',
                'price' => 12000,
                'original_price' => 15000,
                'image' => 'assets/img/gift-shop/IMG-6.webp',
                'category_id' => $categories['art']->id,
                'badge' => 'Handmade',
                'entrepreneur' => 'Peter Mbewe',
                'stock_quantity' => 15,
            ],
            [
                'name' => 'Traditional Woven Basket',
                'description' => 'Traditional woven basket perfect for storage or decoration. Made using sustainable materials.',
                'price' => 9500,
                'image' => 'assets/img/gift-shop/IMG-7.webp',
                'category_id' => $categories['bags']->id,
                'badge' => 'Eco-Friendly',
                'entrepreneur' => 'Agnes Chirwa',
                'stock_quantity' => 20,
            ],
            [
                'name' => 'Herbal Face Powder',
                'description' => 'Natural herbal face powder made from traditional ingredients. Suitable for all skin types.',
                'price' => 4200,
                'original_price' => 5000,
                'image' => 'assets/img/gift-shop/IMG-8.webp',
                'category_id' => $categories['beauty']->id,
                'badge' => 'Natural',
                'entrepreneur' => 'Ruth Kachala',
                'stock_quantity' => 35,
            ],
            [
                'name' => 'Decorative Clay Pot',
                'description' => 'Decorative clay pot with beautiful patterns. Perfect for home decoration or as a planter.',
                'price' => 6800,
                'image' => 'assets/img/gift-shop/IMG-9.webp',
                'category_id' => $categories['pottery']->id,
                'badge' => 'Unique',
                'entrepreneur' => 'James Nyirenda',
                'stock_quantity' => 18,
            ],
            [
                'name' => 'Leather Handbag',
                'description' => 'Premium leather handbag crafted by skilled artisans. Durable and stylish for everyday use.',
                'price' => 22000,
                'original_price' => 25000,
                'image' => 'assets/img/gift-shop/IMG-10.webp',
                'category_id' => $categories['bags']->id,
                'badge' => 'Premium',
                'entrepreneur' => 'Elizabeth Mvula',
                'stock_quantity' => 12,
                'featured' => true,
            ],
            [
                'name' => 'Wooden Art Sculpture',
                'description' => 'Handcarved wooden sculpture representing Malawian culture. A perfect piece for art collectors.',
                'price' => 18500,
                'image' => 'assets/img/gift-shop/IMG-11.webp',
                'category_id' => $categories['art']->id,
                'badge' => 'Cultural',
                'entrepreneur' => 'Daniel Chisale',
                'stock_quantity' => 8,
            ],
            [
                'name' => 'Organic Honey Jar Set',
                'description' => 'Set of three different honey varieties from local beekeepers. Perfect for gifting or personal use.',
                'price' => 16000,
                'original_price' => 20000,
                'image' => 'assets/img/gift-shop/IMG-12.webp',
                'category_id' => $categories['honey']->id,
                'badge' => 'Gift Set',
                'entrepreneur' => 'Moses Kamanga',
                'stock_quantity' => 22,
            ],
            [
                'name' => 'Handmade Soap Collection',
                'description' => 'Collection of handmade soaps with natural ingredients. Gentle on skin and environmentally friendly.',
                'price' => 7500,
                'image' => 'assets/img/gift-shop/IMG-13.webp',
                'category_id' => $categories['beauty']->id,
                'badge' => 'Collection',
                'entrepreneur' => 'Joyce Mwanza',
                'stock_quantity' => 45,
            ],
            [
                'name' => 'Woven Storage Basket',
                'description' => 'Beautifully woven storage basket perfect for organizing your home. Made with sustainable materials.',
                'price' => 11000,
                'image' => 'assets/img/gift-shop/IMG-14.webp',
                'category_id' => $categories['bags']->id,
                'badge' => 'Sustainable',
                'entrepreneur' => 'Faith Banda',
                'stock_quantity' => 28,
            ],
            [
                'name' => 'Traditional Pottery Set',
                'description' => 'Set of traditional pottery pieces with authentic Malawian designs. Perfect for home decoration.',
                'price' => 8500,
                'original_price' => 10000,
                'image' => 'assets/img/gift-shop/IMG-15.webp',
                'category_id' => $categories['pottery']->id,
                'badge' => 'Traditional',
                'entrepreneur' => 'Samuel Mwale',
                'stock_quantity' => 16,
            ],
            [
                'name' => 'Natural Skincare Kit',
                'description' => 'Complete natural skincare kit with locally sourced ingredients. Gentle and effective for all skin types.',
                'price' => 6500,
                'image' => 'assets/img/gift-shop/IMG-16.webp',
                'category_id' => $categories['beauty']->id,
                'badge' => 'Kit',
                'entrepreneur' => 'Mercy Phiri',
                'stock_quantity' => 32,
            ],
            [
                'name' => 'Carved Wooden Bowl',
                'description' => 'Hand-carved wooden bowl with intricate patterns. Perfect for serving or decoration.',
                'price' => 7200,
                'original_price' => 8500,
                'image' => 'assets/img/gift-shop/IMG-17.webp',
                'category_id' => $categories['art']->id,
                'badge' => 'Artisan',
                'entrepreneur' => 'Joseph Tembo',
                'stock_quantity' => 14,
            ],
            [
                'name' => 'Beaded Jewelry Set',
                'description' => 'Beautiful beaded jewelry set handcrafted by local artisans. Includes necklace and earrings.',
                'price' => 4800,
                'image' => 'assets/img/gift-shop/IMG-18.webp',
                'category_id' => $categories['bags']->id,
                'badge' => 'Handcrafted',
                'entrepreneur' => 'Rose Chirwa',
                'stock_quantity' => 38,
            ],
            [
                'name' => 'Herbal Tea Blend',
                'description' => 'Premium herbal tea blend made from locally grown herbs. Perfect for relaxation and wellness.',
                'price' => 3200,
                'image' => 'assets/img/gift-shop/IMG-19.webp',
                'category_id' => $categories['honey']->id,
                'badge' => 'Wellness',
                'entrepreneur' => 'Patrick Kachala',
                'stock_quantity' => 55,
            ],
        ];

        foreach ($products as $productData) {
            $productData['slug'] = Str::slug($productData['name']);
            $productData['sku'] = 'EV-' . strtoupper(Str::random(6));
            $productData['status'] = 'active';
            $productData['in_stock'] = true;
            $productData['manage_stock'] = true;

            Product::create($productData);
        }
    }
}