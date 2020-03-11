<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    //получение данных с ресурса https://news.yandex.ru/army.rss
    public function index(News $news)
    {
        //   $xml = XmlParser::load('https://news.yandex.ru/army.rss');
        $xml = XmlParser::load('https://news.yandex.ru/auto.rss');
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            //'link' => ['uses' => 'channel.link'],
            'text' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
        dd($data['news']);
        foreach ($data['news'] as $item) {
            //dd($item);
            $item['text'] = $item['description'];
            unset($item['description']);;
            //dd($item);
            $news->fill($item);
            $news->save();
        }
        return redirect()->route('news.all');
    }
}
