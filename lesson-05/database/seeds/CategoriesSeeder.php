<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData('Спорт','Новости спорта'));
        DB::table('categories')->insert($this->getData('Политика','Новости политики'));
        DB::table('categories')->insert($this->getData('Авто','Новости авто'));
        DB::table('categories')->insert($this->getData('Погода','Новости погоды'));
        DB::table('categories')->insert($this->getData('Frontend','Новости фронтенд-разработки'));
        DB::table('categories')->insert($this->getData('Backend','Новости бэкэнд-разработки'));
    }

    private function getData($title, $desc)
    {
        $data[] = [
            'title' => $title,
            'desc' => $desc,
        ];
        return $data;
    }
}


