<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                "category" => "Категория не определена",
                "name" => "tosort"
            ],
        ];

        DB::table('categories')->insert($category);
    }
}
