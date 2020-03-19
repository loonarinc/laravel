<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'link'];

    public static function rules() {
        return [
            'name' => 'required|min:3|max:20',
            'link' => 'required',
        ];
    }
    public static function attributeNames() {
        return [
            'name' => 'Название ресурса',
            'link' => 'Линк ресурса',
        ];
    }
}
