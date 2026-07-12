<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Coconut Economy', 'slug' => 'coconut-economy', 'description' => 'News and insights on the coconut industry economics and market trends.'],
            ['name' => 'Sustainability', 'slug' => 'sustainability', 'description' => 'Environmental sustainability, conservation, and sustainable agricultural practices.'],
            ['name' => 'Agro-Tourism', 'slug' => 'agro-tourism', 'description' => 'Agro-tourism development, destinations, and community-based tourism initiatives.'],
            ['name' => 'Culture and Heritage', 'slug' => 'culture-and-heritage', 'description' => 'African cultural heritage, traditions, and the cultural significance of coconut.'],
            ['name' => 'Events', 'slug' => 'events', 'description' => 'Updates on AFRICOCO events, AgunkeFest, and community gatherings.'],
            ['name' => 'Community Impact', 'slug' => 'community-impact', 'description' => 'Stories of community empowerment, youth and women initiatives, and impact reports.'],
        ];

        foreach ($categories as $category) {
            BlogCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category + ['is_active' => true]
            );
        }
    }
}
