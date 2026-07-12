<?php

namespace Database\Seeders;

use App\Models\Pillar;
use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $pillars = Pillar::all()->keyBy('slug');

        $programs = [
            [
                'pillar_slug' => 'coconut-economy-enterprise',
                'title' => 'Coconut Value Chain Development',
                'slug' => 'coconut-value-chain-development',
                'short_description' => 'Advocating for increased coconut cultivation, improved farming practices, value addition, processing, marketing, and investment opportunities across the entire coconut value chain.',
                'full_description' => 'We advocate for increased coconut cultivation, improved farming practices, value addition, processing, marketing, and investment opportunities across the entire coconut value chain. Our initiatives help farmers, entrepreneurs, and investors maximize the economic potential of coconut-based products and services.',
                'icon' => 'leaf',
                'focus_area' => 'Agriculture & Economy',
            ],
            [
                'pillar_slug' => 'coconut-economy-enterprise',
                'title' => 'Advocacy and Awareness',
                'slug' => 'advocacy-and-awareness',
                'short_description' => 'Engaging stakeholders, policymakers, institutions, and communities to promote policies and initiatives that support the sustainable growth of the coconut industry.',
                'full_description' => 'AFRICOCO actively engages stakeholders, policymakers, institutions, and communities to promote policies and initiatives that support the sustainable growth of the coconut industry in Nigeria and Africa.',
                'icon' => 'megaphone',
                'focus_area' => 'Advocacy',
            ],
            [
                'pillar_slug' => 'sustainability-climate-resilience',
                'title' => 'Environmental Sustainability & Tree Planting',
                'slug' => 'environmental-sustainability',
                'short_description' => 'Tree-planting campaigns and conservation initiatives that encourage the restoration of coconut plantations and protection of natural ecosystems.',
                'full_description' => 'Through tree-planting campaigns and conservation initiatives, we encourage the restoration of coconut plantations and the protection of natural ecosystems. We promote sustainable agricultural practices that contribute to climate resilience, environmental preservation, and long-term economic sustainability.',
                'icon' => 'globe',
                'focus_area' => 'Environment',
            ],
            [
                'pillar_slug' => 'heritage-tourism-culture',
                'title' => 'Agro-Tourism Promotion',
                'slug' => 'agro-tourism-promotion',
                'short_description' => 'Leveraging the unique heritage of coconut-growing communities, particularly Badagry, to promote agro-tourism and cultural tourism.',
                'full_description' => 'We leverage the unique heritage of coconut-growing communities, particularly Badagry, to promote agro-tourism and cultural tourism. By showcasing the historical, economic, and cultural significance of coconut, we contribute to destination development and local economic growth.',
                'icon' => 'globe',
                'focus_area' => 'Tourism',
            ],
            [
                'pillar_slug' => 'heritage-tourism-culture',
                'title' => 'Cultural Heritage Preservation',
                'slug' => 'cultural-heritage-preservation',
                'short_description' => 'Celebrating and preserving the rich traditions, arts, crafts, history, and cultural expressions associated with coconut-producing communities.',
                'full_description' => 'We celebrate and preserve the rich traditions, arts, crafts, history, and cultural expressions associated with coconut-producing communities through festivals, exhibitions, educational programs, and community engagement initiatives.',
                'icon' => 'star',
                'focus_area' => 'Culture',
            ],
            [
                'pillar_slug' => 'education-innovation-empowerment',
                'title' => 'Capacity Building and Consultancy',
                'slug' => 'capacity-building-and-consultancy',
                'short_description' => 'Providing training, technical support, and consultancy services to farmers, cooperatives, investors, and government institutions.',
                'full_description' => 'AFRICOCO provides training, technical support, and consultancy services to farmers, cooperatives, investors, organizations, and government institutions seeking to develop sustainable coconut-based projects and enterprises.',
                'icon' => 'academic-cap',
                'focus_area' => 'Education',
            ],
            [
                'pillar_slug' => 'education-innovation-empowerment',
                'title' => 'Youth and Women Empowerment',
                'slug' => 'youth-and-women-empowerment',
                'short_description' => 'Empowering youth and women through entrepreneurial programs, skills development, and economic opportunities in the coconut sector.',
                'full_description' => 'We empower youth and women through entrepreneurial programs, skills development, and economic opportunities in the coconut sector, creating pathways for prosperity and sustainable livelihoods.',
                'icon' => 'user-group',
                'focus_area' => 'Empowerment',
            ],
        ];

        foreach ($programs as $program) {
            $pillarSlug = $program['pillar_slug'];
            unset($program['pillar_slug']);
            
            $pillar = $pillars->get($pillarSlug);
            if (!$pillar) continue;

            Program::updateOrCreate(
                ['slug' => $program['slug']],
                $program + ['pillar_id' => $pillar->id, 'is_active' => true]
            );
        }
    }
}
