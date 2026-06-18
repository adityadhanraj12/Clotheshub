<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Collection;


class CollectionSeeder extends Seeder
{
    public function run(): void
    {
        $mens = Category::where('name', "Men's Collection")->first();
        $womens = Category::where('name', "Women's Collection")->first();
        $accessories = Category::where('name', "Accessories")->first();

        Collection::insert([
            [
                'category_id' => $mens->id,
                'name' => 'T-shirts',
            ],
            [
                'category_id' => $mens->id,
                'name' => 'Hoodies',
            ],
            [
                'category_id' => $mens->id,
                'name' => 'Shorts',
            ],

            [
                'category_id' => $womens->id,
                'name' => 'T-shirts',
            ],
            [
                'category_id' => $womens->id,
                'name' => 'Dresses',
            ],
            [
                'category_id' => $womens->id,
                'name' => 'Pants',
            ],
            [
                'category_id' => $womens->id,
                'name' => 'Shorts',
            ],

            [
                'category_id' => $accessories->id,
                'name' => 'Wallets',
            ],
            [
                'category_id' => $accessories->id,
                'name' => 'Backpacks',
            ],
            [
                'category_id' => $accessories->id,
                'name' => 'Belts',
            ],
            [
                'category_id' => $accessories->id,
                'name' => 'Necklaces',
            ],
        ]);
    }
}
