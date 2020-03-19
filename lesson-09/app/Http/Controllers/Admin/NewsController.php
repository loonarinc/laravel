<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Storage;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::query()
            ->paginate(5);

        return view('admin.index', ['news' => $news]);

    }

    public function edit(News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function destroy(News $news)
    {

        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
    }

    public function update(Request $request, News $news)
    {
            $this->saveData($request, $news);
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена!');
    }

    public function store(Request $request)
    {
            $this->saveData($request, new News());
            return redirect()->route('news.all')->with('success', 'Новость успешно создана!');
    }

    private function saveData(Request $request, News $news)
    {
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $news->image = $url;
        }
        $this->validate($request, News::rules(), [], News::attributeNames());
        //dd($request->all());
        $news->fill($request->all());
        $news->save();
    }
    public function create(News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }
}
