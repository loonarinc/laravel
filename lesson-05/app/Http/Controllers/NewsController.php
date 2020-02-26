<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{


    public function news()
    {

        //$news = DB::select('SELECT id, title, text, isPrivate FROM news');
        $news = DB::table('news')->get();

        return view('news.all', ['news' => $news]);

    }

    public function categoryId($id)
    {
        $news = [];
        foreach (News::getCategories() as $item) {
            if ($item['name'] == $id) $id = $item['id'];
        }

        if (array_key_exists($id, News::getCategories())) {
            $name = News::getCategories()[$id]['category'];
            foreach (News::getNews() as $item) {
                if ($item['category_id'] == $id)
                    $news[] = $item;
            }
            return view('news.onecategory', ['news' => $news, 'category' => $name]);
        } else
            return redirect(route('news.categories'));

    }

    public function categories()
    {
        return view('news.category', ['categories' => News::getCategories()]);
    }

    public function newsOne($id)
    {
        //$news = DB::select('SELECT id, title, text, isPrivate FROM news WHERE id = :id',
        $news = DB::table('news')->find($id);

        if (!empty($news)) {
            return view('news.one', ['news' => $news]);
        }
        else
            return redirect(route('news.all'));

    }



}
