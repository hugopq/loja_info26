<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "Name" => "PC basic",
            "Description" => "PC básico com o melhor benefício custo/qualidade",
            "img" => "/img/4.jpg",
            "Cost" => 599.99,
            "owner_id" => 1,
            "category_id" => 1
        ]);
        Product::create([
            "Name" => "PC basic",
            "Description" => "PC Gamer de ultima geração preparado para os jogos mais exigentes",
            "img" => "/img/1.jpg",
            "Cost" => 3599.99,
            "owner_id" => 1,
            "category_id" => 1
        ]);
        Product::create([
            "Name" => "PC Workstation",
            "Description" => "PC com os melhores componentes",
            "img" => "/img/3.jpg",
            "Cost" => 1599.99,
            "owner_id" => 1,
            "category_id" => 1
        ]);
        Product::create([
            "Name" => "PC Workstation Pro",
            "Description" => "PC Com o melhor desempenho profissional",
            "img" => "/img/3.jpg",
            "Cost" => 2599.99,
            "owner_id" => 1,
            "category_id" => 1
        ]);
    }
}
