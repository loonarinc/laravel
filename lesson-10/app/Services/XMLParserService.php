<?php


namespace App\Services;

use App\Category;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link)
    {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
        $data['title'] = substr(strstr($data['title'], ':'), 2, strlen($data['title']));
        $s=$data['title'];
        $s = (string)$s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => ''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "_", $s); // заменяем пробелы подчёркиванием
        $data['category_name'] = $s;
        foreach ($data['news'] as $item) {
            $existNews = News::where('title', $item['title'])->first();
            $existCategory = Category::where('category', $data['title'])->first();
            if (!$existCategory) {
                $category = new Category();
                $category->category = $data['title'];
                $category->name = $data['category_name'];
                $category->save();
            }
            if($category->name!="")
            {
                $category_id = (int)Category::query()
                    ->where('name', $data['category_name'])
                    ->pluck('id')[0];
            }
            else
            {
                $category_id = (int)Category::query()
                    ->where('name', 'tosort')
                    ->pluck('id')[0];
            }
            if (!$existNews) {
                $news = new News();
                $news->fill([
                    'title' => $item['title'],
                    'image' => $data['image'],
                    'text' => $item['description'],
                    'category_id' => $category_id,
                ]);

                if (!$news->save()) {
                    return redirect()->route('admin.news.index')->with('success','error');
                }
            }
            //  $filename = sprintf('logs%s.txt', time() . rand(0,10000));
            //\Storage::disk('publicLogs')->append($filename, date('c'). ' ' . $link);
            // echo date('c') . ' ' . $link;
            //$time = now();
        }
        return true;
    }

}
