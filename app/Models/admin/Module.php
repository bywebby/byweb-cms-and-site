<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    use HasFactory;

    protected $fillable = ['title','desc','type_id','category_id'];

    //модуль имеет много категорий
    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    //модуль имеет много типов
    public function types() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function getPublicModules($catId) {
        return self::where('category_id', $catId)->with('types')->get();
    }



}
