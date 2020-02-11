<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    $homeRote = route('home');
    $newsRoute = route('news');
    $newsCategoriesRoute = route('newsCategories');
    $adminRoute = route('admin.admin');

        return <<<php
<a href="{$homeRote}">Главная</a>
<a href="{$newsRoute}">Новости</a>
<a href="{$newsCategoriesRoute}">Категории новостей</a>
<a href="{$adminRoute}">Админка</a>
<h1>Добро пожаловать!</h1>
php;

    }
}
