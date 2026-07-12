<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class PageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            // === Homepage Hero Section ===
            [
                'page' => 'home',
                'section_key' => 'hero',
                'title' => "Preserving Africa's Coconut Heritage.\nGrowing Opportunities for Generations.",
                'subtitle' => 'African Coconut Heritage Initiative',
                'body' => 'AFRICOCO is advancing the coconut industry through advocacy, sustainability, agro-tourism, cultural preservation, community empowerment, and value-chain development across Africa.',
                'button_text' => 'Explore Our Impact',
                'button_link' => '/programs',
                'image' => null,
                'is_active' => true,
                'order' => 1,
            ],

            // === Homepage About Summary ===
            [
                'page' => 'home',
                'section_key' => 'about_summary',
                'title' => "Championing Africa's Coconut Heritage",
                'subtitle' => 'Who We Are',
                'body' => 'The African Coconut Heritage Initiative (AFRICOCO) is a non-governmental organization dedicated to promoting, preserving, and advancing the coconut industry as a catalyst for sustainable economic development, environmental conservation, cultural heritage preservation, tourism promotion, and community empowerment across Nigeria and Africa.<br><br>Through advocacy, education, strategic partnerships, research support, exhibitions, festivals, and community development initiatives, we are creating awareness of the opportunities available within the coconut ecosystem.',
                'button_text' => 'Learn More About Us',
                'button_link' => '/about',
                'image' => null,
                'is_active' => true,
                'order' => 2,
            ],

            // === Homepage Mission Section ===
            [
                'page' => 'home',
                'section_key' => 'mission',
                'title' => 'Our Mission',
                'subtitle' => 'Our Purpose',
                'body' => 'To promote and preserve Africa\'s coconut heritage through advocacy, education, tourism, entrepreneurship, innovation, strategic partnerships, and sustainable value-chain development while empowering communities and future generations to benefit from the vast opportunities within the coconut sector.',
                'button_text' => null,
                'button_link' => null,
                'image' => null,
                'is_active' => true,
                'order' => 3,
            ],

            // === Homepage Vision Section ===
            [
                'page' => 'home',
                'section_key' => 'vision',
                'title' => 'Our Vision',
                'subtitle' => 'Our Purpose',
                'body' => 'To build a thriving and globally competitive coconut industry that drives economic prosperity, environmental sustainability, cultural preservation, and inclusive development across Africa.',
                'button_text' => null,
                'button_link' => null,
                'image' => null,
                'is_active' => true,
                'order' => 4,
            ],

            // === Homepage AgunkeFest Section ===
            [
                'page' => 'home',
                'section_key' => 'agunkefest',
                'title' => "AgunkeFest — Celebrating Africa's Coconut Heritage",
                'subtitle' => 'Flagship Event',
                'body' => 'The annual International Coconut Heritage Festival serves as a platform for bringing together farmers, researchers, investors, government agencies, development partners, cultural stakeholders, entrepreneurs, and the general public.',
                'button_text' => 'Learn About AgunkeFest',
                'button_link' => '/events',
                'image' => null,
                'is_active' => true,
                'order' => 6,
            ],

            // === Homepage Volunteer CTA ===
            [
                'page' => 'home',
                'section_key' => 'volunteer_cta',
                'title' => null,
                'subtitle' => null,
                'body' => null,
                'button_text' => 'Become a Volunteer',
                'button_link' => '/volunteer',
                'image' => null,
                'is_active' => true,
                'order' => 11,
            ],

            // === About Page Hero ===
            [
                'page' => 'about',
                'section_key' => 'hero',
                'title' => 'About AFRICOCO',
                'subtitle' => 'Who We Are',
                'body' => 'Learn about our mission, vision, and the team behind the African Coconut Heritage Initiative.',
                'button_text' => null,
                'button_link' => null,
                'image' => null,
                'is_active' => true,
                'order' => 1,
            ],

            // === Contact Page Hero ===
            [
                'page' => 'contact',
                'section_key' => 'hero',
                'title' => 'Get in Touch',
                'subtitle' => 'Contact Us',
                'body' => "Have a question, partnership idea, or want to learn more about our work? We'd love to hear from you.",
                'button_text' => null,
                'button_link' => null,
                'image' => null,
                'is_active' => true,
                'order' => 1,
            ],

        ];

        foreach ($sections as $section) {
            PageSection::updateOrCreate(
                [
                    'page' => $section['page'],
                    'section_key' => $section['section_key'],
                ],
                $section
            );
        }
    }
}
