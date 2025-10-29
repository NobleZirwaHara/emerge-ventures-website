<?php

namespace Database\Seeders;

use App\Models\DigitalSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DigitalSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            [
                'title' => 'Basic Digital Literacy',
                'description' => 'Learn essential computer and internet skills to navigate the digital world with confidence.',
                'short_description' => 'Master the fundamentals of digital technology',
                'image' => 'assets/img/digital-skills/IMG-11.jpg',
                'price' => 100000,
                'duration_hours' => 20,
                'level' => 'beginner',
                'prerequisites' => ['No prior experience required', 'Basic understanding of computers is helpful'],
                'learning_outcomes' => [
                    'Computer fundamentals',
                    'Internet basics',
                    'Email & communication',
                    'File management',
                    'Online safety and security'
                ],
                'features' => [
                    'Hands-on training',
                    'Personalized feedback',
                    'Certificate upon completion',
                    'Small class sizes',
                    'Flexible scheduling'
                ],
                'is_active' => true,
                'featured' => true,
                'max_participants' => 15,
                'start_date' => now()->addDays(7),
                'end_date' => now()->addDays(30)
            ],
            [
                'title' => 'Web Development',
                'description' => 'Master the skills to build responsive and interactive websites from scratch.',
                'short_description' => 'Build modern, responsive websites',
                'image' => 'assets/img/digital-skills/IMG-14.jpg',
                'price' => 100000,
                'duration_hours' => 60,
                'level' => 'intermediate',
                'prerequisites' => ['Basic computer skills', 'Basic understanding of the internet'],
                'learning_outcomes' => [
                    'HTML5 & CSS3',
                    'JavaScript & jQuery',
                    'Responsive design',
                    'Front-end frameworks',
                    'Version control with Git'
                ],
                'features' => [
                    'Project-based learning',
                    'Code reviews',
                    'Portfolio development',
                    'Industry best practices',
                    'Career guidance'
                ],
                'is_active' => true,
                'featured' => true,
                'max_participants' => 12,
                'start_date' => now()->addDays(14),
                'end_date' => now()->addDays(90)
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Learn to create effective digital marketing strategies and campaigns.',
                'short_description' => 'Master digital marketing strategies',
                'image' => 'assets/img/digital-skills/IMG-18.jpg',
                'price' => 100000,
                'duration_hours' => 50,
                'level' => 'intermediate',
                'prerequisites' => ['Basic computer skills', 'Familiarity with social media'],
                'learning_outcomes' => [
                    'Social media marketing',
                    'SEO & content marketing',
                    'Email marketing',
                    'Analytics & reporting',
                    'Paid advertising'
                ],
                'features' => [
                    'Real-world case studies',
                    'Hands-on projects',
                    'Industry tools training',
                    'Networking opportunities',
                    'Certification preparation'
                ],
                'is_active' => true,
                'featured' => true,
                'max_participants' => 15,
                'start_date' => now()->addDays(10),
                'end_date' => now()->addDays(80)
            ],
            [
                'title' => 'Data Analysis',
                'description' => 'Unlock the power of data with our comprehensive data analysis training program.',
                'short_description' => 'Become proficient in data analysis',
                'image' => 'assets/img/digital-skills/IMG-16.jpg',
                'price' => 100000,
                'duration_hours' => 70,
                'level' => 'intermediate',
                'prerequisites' => ['Basic Excel knowledge', 'Analytical thinking'],
                'learning_outcomes' => [
                    'Excel & Google Sheets',
                    'Data visualization',
                    'SQL fundamentals',
                    'Data cleaning & preparation',
                    'Statistical analysis'
                ],
                'features' => [
                    'Real datasets for practice',
                    'Industry-standard tools',
                    'Data visualization techniques',
                    'Case studies',
                    'Portfolio projects'
                ],
                'is_active' => true,
                'featured' => false,
                'max_participants' => 10,
                'start_date' => now()->addDays(21),
                'end_date' => now()->addDays(100)
            ],
            [
                'title' => 'Graphic Design',
                'description' => 'Master the art of visual communication and create stunning designs.',
                'short_description' => 'Create professional designs',
                'image' => 'assets/img/digital-skills/IMG-19.jpg',
                'price' => 100000,
                'duration_hours' => 55,
                'level' => 'beginner',
                'prerequisites' => ['Creativity', 'Basic computer skills'],
                'learning_outcomes' => [
                    'Adobe Photoshop',
                    'Adobe Illustrator',
                    'Design principles',
                    'Typography',
                    'Brand identity'
                ],
                'features' => [
                    'Hands-on design projects',
                    'Industry software training',
                    'Portfolio development',
                    'Design thinking',
                    'Print and digital design'
                ],
                'is_active' => true,
                'featured' => false,
                'max_participants' => 12,
                'start_date' => now()->addDays(14),
                'end_date' => now()->addDays(85)
            ],
            [
                'title' => 'Python Programming',
                'description' => 'Learn one of the most versatile and in-demand programming languages.',
                'short_description' => 'Master Python programming',
                'image' => 'assets/img/digital-skills/IMG-7.jpg',
                'price' => 100000,
                'duration_hours' => 80,
                'level' => 'intermediate',
                'prerequisites' => ['Basic programming concepts', 'Logical thinking'],
                'learning_outcomes' => [
                    'Python basics',
                    'Data structures',
                    'Real-world projects',
                    'Object-oriented programming',
                    'Working with APIs'
                ],
                'features' => [
                    'Hands-on coding exercises',
                    'Project-based curriculum',
                    'Code reviews',
                    'Best practices',
                    'Career guidance'
                ],
                'is_active' => true,
                'featured' => false,
                'max_participants' => 10,
                'start_date' => now()->addDays(7),
                'end_date' => now()->addDays(120)
            ]
        ];

        foreach ($skills as $skill) {
            // Generate slug from title
            $skill['slug'] = Str::slug($skill['title']);
            
            // Create the digital skill
            DigitalSkill::create($skill);
        }
    }
}
