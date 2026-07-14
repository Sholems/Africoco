<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            BlogCategorySeeder::class,
            PillarSeeder::class,
            ProgramSeeder::class,
            PageSectionSeeder::class,
            BlogPostSeeder::class,
        ]);
    }
}
