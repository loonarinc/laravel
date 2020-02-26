<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    private $newsCategories = [
        [
            'id' => 1,
            'short' => 'sport',
            'title' => 'Спорт',
            'description' => 'Новости о спорте'
        ],
        [
            'id' => 2,
            'short' => 'it',
            'title' => 'Информационные технологии',
            'description' => 'Новости о новинках цифрового мира'
        ],
        [
            'id' => 3,
            'short' => 'auto',
            'title' => 'Автомобили',
            'description' => 'Новости автомобилестроения'
        ],
    ];
    private $news = [
        [
            'id' => 1,
            'category' => 'sport',
            'title' => 'Спортивная новость 1',
            'text' => 'А у нас спортивная новость 1 и она очень хорошая!'
        ],
        [
            'id' => 2,
            'category' => 'sport',
            'title' => 'Спортивная новость 2',
            'text' => 'А у нас спортивная новость 2 и она очень хорошая!'
        ],
        [
            'id' => 3,
            'category' => 'sport',
            'title' => 'Спортивная новость 3',
            'text' => 'А у нас спортивная новость 3 и она очень хорошая!'
        ],
        [
            'id' => 4,
            'category' => 'it',
            'title' => 'ИТ-новость 1',
            'text' => 'А у нас ИТ новость 1 и она очень хорошая!'
        ],
        [
            'id' => 5,
            'category' => 'it',
            'title' => 'ИТ-новость 2',
            'text' => 'А у нас ИТ новость 2 и она очень хорошая!'
        ],
        [
            'id' => 6,
            'category' => 'it',
            'title' => 'ИТ-новость 3',
            'text' => 'А у нас ИТ новость 3 и она очень хорошая!'
        ],
        [
            'id' => 7,
            'category' => 'auto',
            'title' => 'Авто-новость 1',
            'text' => 'А у нас Авто новость 1 и она очень хорошая!'
        ],
        [
            'id' => 8,
            'category' => 'auto',
            'title' => 'Авто-новость 2',
            'text' => 'А у нас Авто новость 2 и она очень хорошая!'
        ],
        [
            'id' => 9,
            'category' => 'auto',
            'title' => 'Авто-новость 3',
            'text' => 'А у нас Авто новость 3 и она очень хорошая!'
        ],

    ];

    public function newsCategories() {

        $html = <<<php
<a href="/">Главная</a>
<a href="/news">Новости</a>
<a href="/newsCategories">Категории новостей</a>
<a href="/admin/admin">Админка</a><br>
<h2>Новости</h2>
php;
        foreach ($this->newsCategories as $newsCategories) {
            $html .= <<<php
<a href="/newsCategories/{$newsCategories['short']}">{$newsCategories['title']}</a><br>
php;

        }
        return $html;
    }

    public function newsCategory($id) {
        $html = <<<php
<a href="/">Главная</a>
<a href="/news">Новости</a>
<a href="/newsCategories">Категории новостей</a>
<a href="/admin/admin">Админка</a><br>
php;
        foreach ($this->newsCategories as $newsCategories) {
            $html .= <<<php
<a href="/newsCategories/{$newsCategories['short']}">{$newsCategories['title']}</a><br>
php;
        }
            return $html;
    }

    public function newsOneCategory($short) {
        $html = <<<php
<a href="/">Главная</a>
<a href="/news">Новости</a>
<a href="/newsCategories">Категории новостей</a>
<a href="/admin">Админка</a><br>
php;
        foreach ($this->news as $news) {
            if ($news['category'] == $short) {
                $html .= <<<php
<a href="/newsCategories/{$news['category']}/{$news['id']}">{$news['title']}</a><br>
php;
                }
            }
        return $html;
        }
    public function newsOne2($short, $id) {
        $html = <<<php
<a href="/">Главная</a>
<a href="/news">Новости</a>
<a href="/newsCategories">Категории новостей</a>
<a href="/admin/admin">Админка</a><br>
<h2>{$short}</h2>
php;
        $news = $this->getNewsId($id);
        if (!empty($news)) {
            $html .= <<<php
<h2>{$news['title']}</h2>
<p>{$news['text']}</p>
php;
            return $html;
        }
        //return redirect(route('newsCategories'));

    }
    private function getNewsId($id) {
        foreach ($this->news as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
    }
}
