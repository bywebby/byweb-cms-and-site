<?php

namespace App\Models\admin;

use App\Models\admin\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    //поля которые заполняются в базе
    protected $fillable = ['title','slug','meta_title','meta_desc'];


//отношение одна категория ко многим постам
    public function posts() {

        return $this->hasMany(Post::class);

    }
}
