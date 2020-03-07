<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 * @property string category
 * @property string name
 */
class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'name'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }

}
