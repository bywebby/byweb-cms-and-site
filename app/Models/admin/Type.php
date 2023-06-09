<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //поля которые заполняются в базе
    protected $fillable = ['title'];


//отношение один тип ко многим постам
    public function posts() {

        return $this->hasMany(Post::class, 'type_id');

    }

    public function modules() {

        return $this->hasMany(Module::class);

    }



}
