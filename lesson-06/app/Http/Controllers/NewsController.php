<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news()
    {
        $news = News::query()
            ->where('isPrivate', false)
            ->paginate(5);

        return view('news.all', ['news' => $news]);

    }

    public function categoryId($id)
    {
        $cat = Category::query()->select(['id', 'category'])->where('name', $id)->get();
        $news = Category::query()->find($cat[0]->id)->news()->paginate(5);
        return view('news.onecategory', ['news' => $news, 'category' => $cat[0]->category]);
    }

    public function categories()
    {
        return view('news.category', [
                'categories' => Category::query()->select(['id', 'category', 'name'])->get()
            ]
        );
    }

    public function newsOne(News $news)
    {
        return view('news.one', ['news' => $news]);

    }


}
