<?php

namespace App\Models\admin;


use Illuminate\Database\Eloquent\Model;


class Post extends Model {

//поля которые можно заполнять в таблице постов
    protected $fillable = [
        'title',
        'slug',
        'type_id',
        'description',
        'content',
        'category_id',
        'thumbnail'
    ];

//отношение к категориям
    public function Category() {

        return $this->belongsTo(Category::class);
    }
//отношение к типу постов
    public function Type() {

        return $this->belongsTo(Type::class);

    }




}
