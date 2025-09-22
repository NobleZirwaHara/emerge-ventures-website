<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'E-commerce Platform',
                'slug' => 'ecommerce-platform',
                'short_description' => 'Access to our digital marketplace for entrepreneurs to showcase and sell their products to a wider audience across Malawi and beyond.',
                'description' => 'Our E-commerce Platform provides entrepreneurs with a complete solution to establish and grow their online presence. With our digital marketplace, you can reach customers not just in Malawi but across borders, expanding your market reach significantly.',
                'icon' => 'msi-shopping-cart',
                'features' => [
                    'Digital Storefront Creation',
                    'Payment Processing Solutions',
                    'Logistics & Delivery Support',
                    'Marketing & Promotion Tools',
                    'Analytics & Performance Tracking'
                ],
                'is_active' => true,
                'featured' => true,
                'delivery_time_days' => 1
            ],
            [
                'name' => 'Digital Skills Training',
                'slug' => 'digital-skills-training',
                'short_description' => 'Comprehensive digital literacy and advanced technology training programs designed to bridge the digital divide.',
                'description' => 'Our Digital Skills Training programs are designed to empower Malawians with essential digital literacy and advanced technology skills. From basic computer skills to advanced programming, we offer a range of courses to help individuals thrive in the digital economy.',
                'icon' => 'msi-laptop',
                'features' => [
                    'Computer Literacy & Basic Skills',
                    'Programming & Web Development',
                    'Digital Marketing & Social Media',
                    'Graphic Design & Multimedia',
                    'Data Analysis & Business Intelligence'
                ],
                'is_active' => true,
                'featured' => true,
                'delivery_time_days' => 30
            ],
            [
                'name' => 'Creative Co-Workspace',
                'slug' => 'creative-coworkspace',
                'short_description' => 'A vibrant collaborative workspace for entrepreneurs, freelancers, and creative professionals.',
                'description' => 'Our Creative Co-Workspace provides a dynamic environment where entrepreneurs, freelancers, and creative professionals can work, collaborate, and innovate together. With state-of-the-art facilities and a supportive community, we provide the perfect space for your business to grow.',
                'icon' => 'msi-building',
                'features' => [
                    'High-Speed Internet Access',
                    'Meeting Rooms & Conference Facilities',
                    'Printing & Office Services',
                    '24/7 Security & Access',
                    'Networking Events & Workshops'
                ],
                'is_active' => true,
                'featured' => true,
                'delivery_time_days' => null
            ],
            [
                'name' => 'Gift Shop',
                'slug' => 'gift-shop',
                'short_description' => 'A wonderful shop filled with awesome products of different categories.',
                'description' => 'Our Gift Shop offers a curated selection of unique and locally made products. From handcrafted items to local delicacies, find the perfect gift or treat yourself to something special while supporting local artisans and entrepreneurs.',
                'icon' => 'msi-shopping-bag',
                'features' => [
                    'Wide Range of Products',
                    'Locally Sourced Items',
                    'Unique Gift Options',
                    'Support for Local Artisans',
                    'Regular New Arrivals'
                ],
                'is_active' => true,
                'featured' => false,
                'delivery_time_days' => null
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
