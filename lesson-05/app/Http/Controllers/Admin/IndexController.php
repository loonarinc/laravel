<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\DB;
use Storage;

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
        return response()->json(News::getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function test3() {
        return response()->download('elsa_1.gif');
    }

    public function addNews(Request $request)
    {
        if ($request->isMethod('post')) {
            //$request->flash();

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                //dd($request);
            }
            $data = [
                'title' => $request->title,
                //'category_id' => $request->category,
                'text' => $request->text,
                'image' => $url,
                'isPrivate' => isset($request->isPrivate)
            ];
            DB::table('news')->insert($data);
            return redirect(route('news.all'));
            //Storage::disk('local')->put('news.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            return redirect()->route('news.all')->with('success', 'Новость успешно создана!');
        }

        return view('admin.addNews', ['categories' => News::getCategories()]);
    }

    public function addNews2()
    {
        return view('admin.addNews2', ['categories' => News::getCategories()]);

    }

}
