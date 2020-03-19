<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 *
 * @property string title
 * @property string text
 * @property string image
 * @property boolean isPrivate
 */
class News extends Model
{
public $timestamps = false;

protected $fillable = ['title', 'text', 'isPrivate', 'category_id'];

public  function category() {
    return $this->belongsTo(Category::class, 'category_id')->first();
}

public static function rules() {
    $tableNameCategory = (new Category())->getTable();
    return [
        'title' => 'required|min:5|max:200',
        'text' => 'required',
        'category_id' => "required|exists:{$tableNameCategory},id",
        'image' => 'mimes:jpeg,bmp,png|max:1000'
    ];
}
public static function attributeNames() {
    return [
        'title' => 'Заголовок новости',
        'text' => 'Текст новости',
        'category_id' => "Категория новости",
        'image' => "Изображение"
    ];
}

}
