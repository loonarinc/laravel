<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            [
                "name" => "gadgets",
                "link" => "https://news.yandex.ru/gadgets.rss"
            ],
        ];

        DB::table('resources')->insert($resources);
    }
}
