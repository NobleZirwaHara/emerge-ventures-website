<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $teamMembers = [
            [
                'name' => 'Daniel Mvalo',
                'email' => 'daniel@example.com',
                'position' => 'CEO',
                'bio' => 'Daniel is our visionary leader, guiding the team towards success and innovation.',
                'profile_image' => '/assets/img/user/profile1.JPG',
                'is_active' => true,
                'sort_order' => 1,
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'phone' => '+265 999 999 999',
            ],
            [
                'name' => 'Happy Chiputu',
                'email' => 'happy@example.com',
                'position' => 'Administration and Operations Officer',
                'bio' => 'Happy oversees daily operations and ensures smooth administration across the organization.',
                'profile_image' => '/assets/img/user/profile2.jpg',
                'is_active' => true,
                'sort_order' => 2,
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'phone' => '+265 999 999 998',
            ],
            [
                'name' => 'Shadreck Mawindo',
                'email' => 'shadreck@example.com',
                'position' => 'Digital Skills Trainer',
                'bio' => 'Shadreck empowers individuals with essential digital skills for work and innovation.',
                'profile_image' => '/assets/img/user/profile4.jpg',
                'is_active' => true,
                'sort_order' => 3,
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'phone' => '+265 999 999 997',
            ],
            [
                'name' => 'Hellen Tembo',
                'email' => 'hellen@example.com',
                'position' => 'Client Relations Officer',
                'bio' => 'Hellen builds strong client relationships and ensures satisfaction with our services.',
                'profile_image' => '/assets/img/user/profile3.jpg',
                'is_active' => true,
                'sort_order' => 4,
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'phone' => '+265 999 999 996',
            ],
        ];

        foreach ($teamMembers as $member) {
            TeamMember::create($member);
        }
    }
}
