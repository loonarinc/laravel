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
        $news = News::query()->paginate(5);
        return view('news.all', ['news' => $news]);

    }

    public function categoryId($id)
    {
        $cat = Category::query()->where('name', $id)->firstOrFail();
        $news = Category::query()->find($cat->id)->news()->paginate(5);

        return view('news.onecategory', [
            'news' => $news,
            'category' => $cat->category
        ]);


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
