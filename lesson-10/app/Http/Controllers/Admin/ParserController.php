<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsParsing;
use App\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Services\XMLParserService;

class ParserController extends Controller
{

    public function index(XMLParserService $parserService) {
        $start = date('c');
        $links = Resources::all();
        foreach ($links as $link) {
            //$parserService->saveNews($link);
            NewsParsing::dispatch($link->link);
        }
        return redirect()->route('admin.news.index')->with('success', 'Новости успешно добавлены!');
    }
}
