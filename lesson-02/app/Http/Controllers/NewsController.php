<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!'
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости((('
        ],
    ];

    public function news() {

        $html = <<<php
<a href="/">Главная</a>
<a href="/news">Новости</a>
<a href="/newsCategories">Категории новостей</a>
<a href="/admin">Админка</a><br>
<h2>Новости</h2>
php;
foreach ($this->news as $news) {
    $html .= <<<php
<a href="/news/{$news['id']}">{$news['title']}</a><br>
php;
}
        return $html;
    }

    public function newsOne($id) {
        $html = <<<php
<a href="/">Главная</a>
<a href="/news">Новости</a>
<a href="/admin/admin">Админка</a><br>
php;
        $news = $this->getNewsId($id);
if (!empty($news)) {
$html .= <<<php
<h2>{$news['title']}</h2>
<p>{$news['text']}</p>
php;

    return $html;
}
    return redirect(route('news'));

    }

    private function getNewsId($id) {
        foreach ($this->news as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
    }
}
