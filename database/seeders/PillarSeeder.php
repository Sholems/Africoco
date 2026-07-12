<?php

namespace Database\Seeders;

use App\Models\Pillar;
use Illuminate\Database\Seeder;

class PillarSeeder extends Seeder
{
    public function run(): void
    {
        $pillars = [
            [
                'name' => 'Coconut Economy & Enterprise Development',
                'slug' => 'coconut-economy-enterprise',
                'description' => 'Driving entrepreneurship, value addition, investment, business development, processing, exports, and employment throughout the coconut value chain.',
                'icon' => 'briefcase',
                'color' => 'emerald',
                'display_order' => 1,
            ],
            [
                'name' => 'Sustainability & Climate Resilience',
                'slug' => 'sustainability-climate-resilience',
                'description' => 'Promoting environmental conservation, coconut tree planting, coastal restoration, biodiversity, and sustainable agricultural practices.',
                'icon' => 'leaf',
                'color' => 'teal',
                'display_order' => 2,
            ],
            [
                'name' => 'Heritage, Tourism & Culture',
                'slug' => 'heritage-tourism-culture',
                'description' => 'Celebrating Africa\'s coconut heritage through tourism, culture, history, AgunkeFest, heritage trails, and community experiences.',
                'icon' => 'globe',
                'color' => 'amber',
                'display_order' => 3,
            ],
            [
                'name' => 'Education, Innovation & Community Empowerment',
                'slug' => 'education-innovation-empowerment',
                'description' => 'Providing training, research, innovation, youth empowerment, women empowerment, digital learning, and knowledge sharing.',
                'icon' => 'academic-cap',
                'color' => 'blue',
                'display_order' => 4,
            ],
            [
                'name' => 'Partnerships, Policy & Investment',
                'slug' => 'partnerships-policy-investment',
                'description' => 'Building strategic partnerships, influencing policy, attracting investment, promoting collaboration, and connecting stakeholders across Africa.',
                'icon' => 'handshake',
                'color' => 'purple',
                'display_order' => 5,
            ],
        ];

        foreach ($pillars as $pillar) {
            Pillar::updateOrCreate(
                ['slug' => $pillar['slug']],
                $pillar
            );
        }
    }
}
