<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "Name" => "Computadores",
        ]);
        Category::create([
            "Name" => "Teclados",
        ]);
        Category::create([
            "Name" => "Ratos",
        ]);
        Category::create([
            "Name" => "Placas Gráficas",
        ]);
    }
}
