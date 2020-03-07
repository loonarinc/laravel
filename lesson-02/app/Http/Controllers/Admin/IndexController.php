<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {

        return <<<php
<a href="/">Главная</a>
<a href="/news">Новости</a>
<a href="/newsCategories">Категории новостей</a>
<a href="/admin/test1">Test1</a>
<a href="/admin/test2">Test2</a>
<h1>Добро пожаловать Admin!</h1>
php;

    }

    public function test1() {
       // $routeName = route('admin.test1');
        return <<<php
<a href="/">Главная</a>
<a href="/admin/admin">Админка</a>
<h2>test1</h2>
php;

    }
    public function test2() {
        return <<<php
<a href="/">Главная</a>
<a href="/admin/admin">Админка</a>
<h2>test2</h2>
php;

    }

}
