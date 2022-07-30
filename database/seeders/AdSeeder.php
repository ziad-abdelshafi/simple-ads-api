<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Advertiser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create random number of ads related with random number of tags
        for ($i = 0; $i < 10; ++$i) {
            Ad::factory()
                ->count(rand(1,3))
                ->for(Advertiser::factory())
                ->for(Category::factory())
                ->has(Tag::factory()->count(rand(1,3)))
                ->create();
        }
    }
}
