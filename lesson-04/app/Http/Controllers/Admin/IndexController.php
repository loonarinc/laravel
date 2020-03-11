<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function test1(Request $request) {
        $content = view('admin.test1')->render();
        return response($content)
            ->header('Content-type', 'application/txt')
            ->header('Content-Length', mb_strlen($content))
            ->header('Content-Disposition', 'attachment; filename = "downloaded.txt"');

    }

    public function test2() {
        return response()->json(News::$news)
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function test3() {
        return response()->download('elsa_1.gif');
    }

    public function addNews(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            return redirect()->route('admin.addNews');
        }

        return view('admin.addNews', ['categories' => News::$category]);
    }

    public function addNews2()
    {
        return view('admin.addNews2', ['categories' => News::$category]);

    }

}
