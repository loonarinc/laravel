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
                "category" => "Спорт",
                "name" => "sport"
            ],
            [
                "category" => "Политика",
                "name" => "politics"
            ]
        ];

        DB::table('categories')->insert($category);
    }
}
