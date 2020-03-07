<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class News extends Model
{
    public static $news = [
        '1' => [
            'id' => 1,
            'title' => 'Новости спорта 1',
            'text' => 'А у нас новость спорта 1 и она очень хорошая!',
            'category_id' => 1,
            'image' => null,
            'isPrivate' => false
        ],
        '2' => [
            'id' => 2,
            'title' => 'Новости спорта 2',
            'category_id' => 1,
            'image' => null,
            'text' => 'А тут плохие новости спорта 2(((',
            'isPrivate' => false
        ],
        '3' => [
            'id' => 3,
            'title' => 'Новости политики 1',
            'text' => 'А у нас новость политики 1 и она очень хорошая!',
            'category_id' => 2,
            'image' => null,
            'isPrivate' => false
        ],
        '4' => [
            'id' => 4,
            'title' => 'Новости политики 2',
            'category_id' => 2,
            'image' => null,
            'text' => 'А тут плохие новости политики 2(((',
            'isPrivate' => false
        ],
    ];
    public static $category = [
        '1' => [
            'id' => 1,
            'category' => 'Спорт',
            'name' => 'sport'
        ],
        '2' => [
            'id' => 2,
            'category' => 'Политика',
            'name' => 'politics'
        ]
    ];
    public static function getNews():array
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }
    public static function getCategories():array
    {
        return json_decode(Storage::disk('local')->get('category.json'), true);
    }
}
