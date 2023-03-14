<?php

namespace Database\Seeders;

use App\Models\SearchItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SearchItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SearchItem::factory()->count(10)->create();
    }
}
