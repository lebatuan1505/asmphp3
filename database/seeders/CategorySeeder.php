<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Sách ngụ ngôn'],
            ['name' => 'Khoa học'],
            ['name' => 'Sách giáo khoa'],
            ['name' => 'Truyện tranh'],
            ['name' => 'Thế giới']
        ]);
    }
}
