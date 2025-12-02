<?php

namespace Database\Seeders;

use App\Models\Entrepreneur;
use Illuminate\Database\Seeder;

class EntrepreneurSeeder extends Seeder
{
    public function run(): void
    {
        $entrepreneurs = [
            // Arteria Afrique
            [
                'name' => 'Tamala Manda',
                'email' => 'arteria.afrique@outlook.com',
                'phone' => '+265 994 376 063',
                'business_name' => 'Arteria Afrique',
                'business_description' => 'An African brand creating elegant, handcrafted products from authentic African print fabrics, primarily focused on bag making with plans to expand into apparel.',
                'business_preview' => 'Elegant, handcrafted products made from authentic African print fabrics...',
                'industry' => 'Fashion & Accessories',
                'location' => 'Mzuzu, Malawi',
                'business_address' => 'Mzuzu, Malawi',
                'business_phone' => '+265 994 376 063',
                'business_email' => 'arteria.afrique@outlook.com',
                'business_hours' => 'Mon - Fri: 9:00 AM - 5:00 PM',
                'website' => null,
                'social_media' => [
                    'instagram' => 'arteria_afrique',
                    'facebook' => 'ArteriaAfrique',
                ],
                'profile_image' => 'assets/img/entrepreneurs/Tamala_Manda.jpg',
                'business_logo' => 'assets/icons/fashion.png',
                'bio' => 'Founder of Arteria Afrique, passionate about African fashion and cultural expression.',
                'overview' => 'Arteria Afrique creates elegant, handcrafted products from authentic African print fabrics, celebrating African heritage through design. The brand is known for its focus on quality and cultural representation.',
                'role' => 'Founder',
                'founded_year' => 2020,
                'business_size' => '5-15 employees',
                'skills' => ['Fashion Design', 'Textile Arts', 'Brand Development', 'African Print Design'],
                'achievements' => [
                    'Established a loyal customer base in Mzuzu',
                    'Launched a diverse line of handcrafted bags',
                    'Partnered with local artisans and fabric suppliers'
                ],
                'milestones' => [
                    ['date' => '2023', 'description' => 'Expanded product line with new designs'],
                    ['date' => '2022', 'description' => 'Launched product line of handcrafted bags'],
                    ['date' => '2020', 'description' => 'Founded Arteria Afrique']
                ],
                'partners' => ['Emerge Ventures (Mzuzu)', 'Local fabric suppliers and artisans'],
                'value_proposition' => 'High-quality, handcrafted fashion accessories that celebrate African heritage and craftsmanship.',
                'five_year_plan' => 'Expand product line to include apparel and home décor, establish a flagship store, and launch an e-commerce platform.',
                'status' => 'approved',
                'featured' => true,
                'joined_date' => now()->subYears(3)->toDateString()
            ],

            // Comet Interiors
            [
                'name' => 'Titus Gondwe',
                'email' => 'comet.interiors@example.com',
                'phone' => '+265 999 999 999',
                'business_name' => 'Comet Interiors',
                'business_description' => 'A full-service interior design company specializing in transforming residential and commercial spaces into functional, elegant environments.',
                'business_preview' => 'Transforming spaces with creative, sustainable, and functional interior design solutions...',
                'industry' => 'Interior Design & Architecture',
                'location' => 'Mzuzu, Malawi',
                'business_address' => 'Mzuzu, Malawi',
                'business_phone' => '+265 999 999 999',
                'business_email' => 'comet.interiors@example.com',
                'business_hours' => 'Mon - Fri: 8:30 AM - 5:30 PM',
                'website' => null,
                'social_media' => [
                    'instagram' => 'comet_interiors',
                    'facebook' => 'CometInteriorsMzuzu',
                ],
                'profile_image' => 'assets/img/entrepreneurs/Titus_Gondwe.jpg',
                'business_logo' => 'assets/icons/design.png',
                'bio' => 'Founder & Lead Designer of Comet Interiors, passionate about creating inspiring and functional spaces.',
                'overview' => 'Comet Interiors is a full-service interior design company that blends creativity, sustainability, and craftsmanship to transform spaces. With expertise in architectural design, furniture making, and landscaping, the company delivers turnkey solutions that reflect client visions while enhancing spatial aesthetics.',
                'role' => 'Founder & Lead Designer',
                'founded_year' => 2021,
                'business_size' => '5-15 employees',
                'skills' => ['Interior Design', 'Space Planning', 'Furniture Design', 'Sustainable Architecture'],
                'achievements' => [
                    'Completed over 50 design projects',
                    'Launched diverse product lines of décor and furniture',
                    'Introduced landscaping services for urban clients'
                ],
                'milestones' => [
                    ['date' => '2023', 'description' => 'Expanded services to include landscaping'],
                    ['date' => '2022', 'description' => 'Launched furniture and décor product lines'],
                    ['date' => '2021', 'description' => 'Founded Comet Interiors']
                ],
                'partners' => ['Local suppliers and real estate developers'],
                'value_proposition' => 'Blending creativity, sustainability, and craftsmanship to offer turnkey interior solutions that elevate everyday spaces.',
                'five_year_plan' => 'Expand operations, launch a showroom, introduce eco-friendly product lines, and train 50+ youth in design.',
                'status' => 'approved',
                'featured' => true,
                'joined_date' => now()->subYears(2)->toDateString()
            ],

            // Kwanza Cocoa
            [
                'name' => 'Wezi Mzumala',
                'email' => 'kwanzacocoa@gmail.com',
                'phone' => '+265 993 582 413',
                'business_name' => 'Kwanza Cocoa',
                'business_description' => 'A multifaceted business combining agriculture and manufacturing of cocoa products in Malawi, producing bespoke artisan chocolates and expanding into cocoa powder, cocoa butter, and products with locally sourced ingredients.',
                'business_preview' => 'Producing high-quality cocoa products while supporting sustainable agriculture in Malawi...',
                'industry' => 'Agriculture & Food Manufacturing',
                'location' => 'Mzuzu, Malawi',
                'business_address' => '5 Ndaona Street, Chimalilo, Mzuzu, Malawi',
                'business_phone' => '+265 993 582 413',
                'business_email' => 'kwanzacocoa@gmail.com',
                'business_hours' => 'Mon - Sat: 8:00 AM - 5:00 PM',
                'website' => null,
                'social_media' => [
                    'instagram' => 'kwanza_cocoa',
                    'facebook' => 'KwanzaCocoaMW',
                ],
                'profile_image' => 'assets/img/entrepreneurs/Wezzie_Mzumala.jpg',
                'business_logo' => 'assets/icons/Kwanza_Cocoa.jpg',
                'bio' => 'Founder of Kwanza Cocoa, dedicated to building a sustainable cocoa industry in Malawi.',
                'overview' => 'Kwanza Cocoa is revolutionizing Malawi\'s cocoa industry by combining agriculture and manufacturing. The company works directly with smallholder farmers through its outgrowers program, ensuring fair pricing and sustainable farming practices. Kwanza Cocoa produces premium cocoa products including artisan chocolates, cocoa powder, and cocoa butter, often enhanced with locally sourced ingredients like coffee, macadamia, and moringa.',
                'role' => 'Founder',
                'founded_year' => 2020,
                'business_size' => '5-15 employees',
                'skills' => ['Agribusiness', 'Food Processing', 'Supply Chain Management', 'Sustainable Agriculture'],
                'achievements' => [
                    'Established cocoa plantation and outgrowers program',
                    'Launched artisan chocolate production',
                    'Introduced cocoa powder and butter product lines'
                ],
                'milestones' => [
                    ['date' => '2023', 'description' => 'Expanded product lines with local additives'],
                    ['date' => '2022', 'description' => 'Established outgrowers program'],
                    ['date' => '2020', 'description' => 'Founded Kwanza Cocoa']
                ],
                'partners' => ['Local farmers and agricultural cooperatives'],
                'value_proposition' => 'High-quality, locally produced cocoa products that support sustainable agriculture and empower local farmers.',
                'five_year_plan' => 'Expand cocoa plantation, scale up manufacturing, and establish retail partnerships across SADC region.',
                'status' => 'approved',
                'featured' => true,
                'joined_date' => now()->subYears(3)->addMonths(2)->toDateString()
            ],

            // Lweya Honey
            [
                'name' => 'Lusungu Mwale',
                'email' => 'lweyahoney@gmail.com',
                'phone' => '+265 991 219 669',
                'business_name' => 'Lweya Honey',
                'business_description' => 'A social enterprise empowering rural women and youth in Malawi through climate-smart beekeeping, promoting sustainable livelihoods, land restoration, and climate change literacy.',
                'business_preview' => 'Empowering communities through sustainable beekeeping and producing 100% natural, raw honey...',
                'industry' => 'Agriculture & Environmental Sustainability',
                'location' => 'Mzimba District, Malawi',
                'business_address' => 'P.O. BOX 9, Chikangawa, Mzimba District, Malawi',
                'business_phone' => '+265 991 219 669',
                'business_email' => 'lweyahoney@gmail.com',
                'business_hours' => 'Mon - Fri: 8:00 AM - 4:30 PM',
                'website' => null,
                'social_media' => [
                    'instagram' => 'lweya_honey',
                    'facebook' => 'LweyaHoney',
                ],
                'profile_image' => 'assets/img/entrepreneurs/Lusungu_Mwale.jpg',
                'business_logo' => 'assets/icons/environment.png',
                'bio' => 'Founder of Lweya Honey, passionate about environmental conservation and community empowerment.',
                'overview' => 'Lweya Honey is transforming communities in northern Malawi through sustainable beekeeping. The enterprise trains and supports rural women and youth in beekeeping, helping them generate income while restoring deforested lands. By focusing on climate-smart practices, Lweya Honey produces premium raw honey while addressing environmental challenges and promoting biodiversity.',
                'role' => 'Founder',
                'founded_year' => 2020,
                'business_size' => '5-15 employees',
                'skills' => ['Beekeeping', 'Environmental Conservation', 'Community Development', 'Sustainable Agriculture'],
                'achievements' => [
                    'Empowered over 100 rural beekeepers',
                    'Launched Lweya Forest Honey product line',
                    'Established operations in deforested regions of Northern Malawi'
                ],
                'milestones' => [
                    ['date' => '2023', 'description' => 'Expanded beekeeping training programs'],
                    ['date' => '2022', 'description' => 'Launched Lweya Forest Honey brand'],
                    ['date' => '2020', 'description' => 'Founded Lweya Honey']
                ],
                'partners' => ['Emerge Ventures', 'Local community organizations'],
                'value_proposition' => '100% natural, raw honey that supports reforestation and youth empowerment.',
                'five_year_plan' => 'Train 500+ rural beekeepers, launch reforestation campaigns, and develop honey processing facilities.',
                'status' => 'approved',
                'featured' => true,
                'joined_date' => now()->subYears(3)->addMonths(4)->toDateString()
            ],

            // Pretak Investments
            [
                'name' => 'Innocent',
                'email' => 'pretakinvestments@gmail.com',
                'phone' => '+265 991 807 387',
                'business_name' => 'Pretak Investments',
                'business_description' => 'A proudly Malawian brand creating high-quality, affordable personal care and household products that meet everyday needs, promoting wellness and cleanliness through natural-inspired formulas.',
                'business_preview' => 'Creating high-quality, affordable personal care and household products with natural ingredients...',
                'industry' => 'Personal Care & Household Products',
                'location' => 'Malawi',
                'business_address' => 'Malawi',
                'business_phone' => '+265 991 807 387',
                'business_email' => 'pretakinvestments@gmail.com',
                'business_hours' => 'Mon - Fri: 8:00 AM - 5:00 PM',
                'website' => null,
                'social_media' => [
                    'facebook' => 'PretakInvestments',
                ],
                'profile_image' => 'assets/img/entrepreneurs/solid-color-image.jpeg',
                'business_logo' => 'assets/icons/beauty.png',
                'bio' => 'Founder of Pretak Investments, committed to promoting wellness through quality personal care products.',
                'overview' => 'Pretak Investments is dedicated to creating high-quality, affordable personal care and household products that meet the everyday needs of Malawian families. The company focuses on natural-inspired formulas that are gentle, effective, and safe for the whole family, using locally sourced ingredients where possible. Pretak Investments is committed to quality, consistency, and customer satisfaction in every product.',
                'role' => 'Founder',
                'founded_year' => 2021,
                'business_size' => '5-15 employees',
                'skills' => ['Product Development', 'Cosmetic Chemistry', 'Brand Management', 'Business Strategy'],
                'achievements' => [
                    'Launched diverse product line including body scrubs and hair care',
                    'Established loyal customer base through quality and affordability',
                    'Integrated locally sourced ingredients into formulations'
                ],
                'milestones' => [
                    ['date' => '2023', 'description' => 'Expanded product distribution'],
                    ['date' => '2022', 'description' => 'Launched new product lines'],
                    ['date' => '2021', 'description' => 'Founded Pretak Investments']
                ],
                'partners' => ['Local suppliers and retailers'],
                'value_proposition' => 'High-quality, affordable personal care and household products made with natural ingredients.',
                'five_year_plan' => 'Expand distribution, introduce new product lines, and establish a manufacturing facility.',
                'status' => 'approved',
                'featured' => true,
                'joined_date' => now()->subYears(2)->addMonths(3)->toDateString()
            ],

            // &Proud Africa
            [
                'name' => 'Henry Ngwira',
                'email' => 'andproudafrica@gmail.com',
                'phone' => '+265 991 351 411',
                'business_name' => '&Proud Africa',
                'business_description' => 'A sustainability-driven brand transforming plastic waste into handcrafted, ethical fashion accessories while pioneering a local plastic waste management system that empowers communities and promotes environmental stewardship.',
                'business_preview' => 'Transforming plastic waste into stylish, ethical fashion accessories while cleaning up the environment...',
                'industry' => 'Sustainable Fashion & Environmental Technology',
                'location' => 'Mzuzu, Malawi',
                'business_address' => 'Mzuzu – Chiputula, near Best Valley School, Malawi',
                'business_phone' => '+265 991 351 411',
                'business_email' => 'andproudafrica@gmail.com',
                'business_hours' => 'Mon - Fri: 8:30 AM - 5:00 PM',
                'website' => null,
                'social_media' => [
                    'instagram' => 'andproudafrica',
                    'facebook' => 'AndProudAfrica',
                ],
                'profile_image' => 'assets/img/entrepreneurs/Henry_Ngwira.jpg',
                'business_logo' => 'assets/icons/recycling.png',
                'bio' => 'Founder of &Proud Africa, committed to solving plastic pollution through creative upcycling.',
                'overview' => '&Proud Africa is at the forefront of Malawi\'s sustainability movement, transforming plastic waste into fashionable, functional products. The company has developed a full-cycle plastic waste management system that collects, processes, and upcycles plastic waste into high-quality fashion accessories. By creating economic opportunities for local communities and reducing environmental pollution, &Proud Africa is making a significant impact in the fight against plastic waste.',
                'role' => 'Founder',
                'founded_year' => 2020,
                'business_size' => '5-15 employees',
                'skills' => ['Sustainable Design', 'Waste Management', 'Social Entrepreneurship', 'Product Development'],
                'achievements' => [
                    'Developed a full-cycle plastic waste management system',
                    'Launched 17+ product lines made from recycled plastic',
                    'Secured retail presence in 7 major locations across Malawi'
                ],
                'milestones' => [
                    ['date' => '2023', 'description' => 'Expanded retail partnerships across Malawi'],
                    ['date' => '2021', 'description' => 'Launched 17+ product lines'],
                    ['date' => '2020', 'description' => 'Founded &Proud Africa']
                ],
                'partners' => [
                    'Emerge Ventures (Mzuzu)',
                    'Butterfly Lodge (Nkhatabay)',
                    'Kaya Mawa Lodge (Likoma)',
                    'African Habitant (Blantyre)',
                    'Club Makokola (Mangochi)'
                ],
                'value_proposition' => 'Turning waste into worth: stylish, durable, and eco-conscious products made entirely from recycled plastic.',
                'five_year_plan' => 'Expand waste collection, introduce new product lines, and establish an online store for global reach.',
                'status' => 'approved',
                'featured' => true,
                'joined_date' => now()->subYears(3)->addMonths(6)->toDateString()
            ],

            // Steady Printers
            [
                'name' => 'Steady Printers',
                'email' => 'steady.printers@example.com',
                'phone' => '+265 999 999 998',
                'business_name' => 'Steady Printers',
                'business_description' => 'A creative hub blending professional printing services with handcrafted, eco-conscious products, including engraved portraits, custom key holders, decorative pots, and stylish bags made from recycled materials.',
                'business_preview' => 'Professional printing services combined with creative, eco-friendly products...',
                'industry' => 'Printing & Eco-Design',
                'location' => 'Malawi',
                'business_address' => 'Malawi',
                'business_phone' => '+265 999 999 998',
                'business_email' => 'steady.printers@example.com',
                'business_hours' => 'Mon - Fri: 8:00 AM - 5:00 PM',
                'website' => null,
                'social_media' => [
                    'facebook' => 'SteadyPrintersMW',
                ],
                'profile_image' => 'assets/img/entrepreneurs/solid-color-image.jpeg',
                'business_logo' => 'assets/icons/print.png',
                'bio' => 'Founder of Steady Printers, combining creativity with sustainability in print and design.',
                'overview' => 'Steady Printers is more than just a print company; it\'s a creative hub that combines professional printing services with eco-conscious product design. The company specializes in transforming waste materials like wooden cutoffs, recycled paper, and advertising banners into beautiful, functional products. From engraved portraits to custom key holders and decorative items, Steady Printers demonstrates how creativity and sustainability can go hand in hand.',
                'role' => 'Founder',
                'founded_year' => 2020,
                'business_size' => '5-15 employees',
                'skills' => ['Graphic Design', 'Product Design', 'Sustainable Manufacturing', 'Creative Reuse'],
                'achievements' => [
                    'Developed a line of eco-conscious products from recycled materials',
                    'Established a reputation for high-quality printing and creative customization',
                    'Featured in Emerge Ventures Gift Shop'
                ],
                'milestones' => [
                    ['date' => '2023', 'description' => 'Expanded product line with new recycled materials'],
                    ['date' => '2021', 'description' => 'Launched eco-friendly product lines'],
                    ['date' => '2020', 'description' => 'Founded Steady Printers']
                ],
                'partners' => ['Emerge Ventures', 'Local sustainability-focused organizations'],
                'value_proposition' => 'Professional printing services combined with creative, eco-friendly products made from recycled materials.',
                'five_year_plan' => 'Expand eco-conscious product lines, establish an online store, and open new branches.',
                'status' => 'approved',
                'featured' => true,
                'joined_date' => now()->subYears(3)->addMonths(8)->toDateString()
            ],

            // Umoza Products (Umoza Coffee)
            [
                'name' => 'Lyton Femas Newa',
                'email' => 'femaslytonewa@umozaproducts.com',
                'phone' => '+265 999 999 997',
                'business_name' => 'Umoza Products (Umoza Coffee)',
                'business_description' => 'A Small Medium Enterprise (SME) based in Mzuzu, Malawi, specializing in coffee value addition, processing and selling coffee green beans, roasted coffee, and pure ground coffee, directly sourcing from smallholder farmers.',
                'business_preview' => 'Specialty coffee products sourced directly from Malawian smallholder farmers...',
                'industry' => 'Coffee Processing & Agribusiness',
                'location' => 'Mzuzu, Malawi',
                'business_address' => '2nd floor, Kwawala building, close to Mataifa old town, Mzuzu, Malawi',
                'business_phone' => '+265 999 999 997',
                'business_email' => 'umozacoffee@gmail.com',
                'business_hours' => 'Mon - Sat: 8:00 AM - 5:00 PM',
                'website' => 'www.umozaproducts.com',
                'social_media' => [
                    'instagram' => 'umozacoffee',
                    'facebook' => 'UmozaCoffee',
                    'linkedin' => 'lytonfemasnewa'
                ],
                'profile_image' => 'assets/img/entrepreneurs/solid-color-image.jpeg',
                'business_logo' => 'assets/icons/coffee.png',
                'bio' => 'Founder & Managing Director of Umoza Products, passionate about coffee value addition and farmer empowerment.',
                'overview' => 'Umoza Products, operating under the brand Umoza Coffee, is dedicated to transforming Malawi\'s coffee industry through value addition and direct market access for smallholder farmers. The company works closely with farmers in Rumphi and other northern regions, providing training on modern farming techniques and fair pricing. Umoza Coffee offers a range of premium coffee products, from green beans to specialty roasted and ground coffee, all while maintaining the highest quality standards and supporting local communities.',
                'role' => 'Founder & Managing Director',
                'founded_year' => 2022,
                'business_size' => '11-50 employees',
                'skills' => ['Coffee Processing', 'Agribusiness', 'Value Chain Development', 'Business Management'],
                'achievements' => [
                    'Served over 1,500 unique customers',
                    'Achieved 45% repeat purchase rate',
                    '40% year-over-year revenue growth',
                    'Established partnerships with multiple cooperatives'
                ],
                'milestones' => [
                    ['date' => '2023', 'description' => 'Expanded distribution network'],
                    ['date' => '2022-03', 'description' => 'Officially launched Umoza Products'],
                    ['date' => '2021', 'description' => 'Began product development and farmer partnerships']
                ],
                'partners' => [
                    'Aperekezi Coffee',
                    'African Fine Coffee Association of Malawi',
                    'Phoka Growers Cooperative',
                    'Malawi Coffee Association'
                ],
                'value_proposition' => 'Ethically sourced, high-quality Malawian coffee that directly supports smallholder farmers and local communities.',
                'five_year_plan' => 'Expand processing capacity, increase farmer partnerships, and establish international market presence.',
                'status' => 'approved',
                'featured' => true,
                'joined_date' => now()->subYears(2)->addMonths(9)->toDateString()
            ]
        ];

        foreach ($entrepreneurs as $entrepreneurData) {
            Entrepreneur::create($entrepreneurData);
        }
    }
}