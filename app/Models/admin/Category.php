<?php

namespace App\Models\admin;

use App\Models\admin\menu\MenuType;
use App\Models\admin\Post;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\calc\CalcModule;

class Category extends Model {

//поля которые заполняются в базе
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_desc',
        'status',
        'parrent_id',
        'show',
        'menu_type_id',
        'class',
        'landing'
    ];

//отношение одна категория ко многим постам
    public function posts() {
        return $this->hasMany(Post::class,'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules() {
        return $this->hasMany(Module::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Привязка к категории один к одному, т.к. модуль относится только к одной категории
     */
    public function calcModules() {
        return $this->hasOne(Calcmodule::class, 'category_id');
    }

    public function menuTypes() {
        return $this->belongsTo(MenuType::class, 'menu_type_id');
    }

    //определяет в самой себя наименование категории по parrent_id => id далее title получаем
    public function nameCategory() {
        return $this->belongsTo(self::class, 'parrent_id', 'id');
    }


   public function scopegetPublicMenu(){
       return self::where('show',1)->where('status',1)->get();
   }


   public function type() {

        return $this->belongsTo(Type::class, 'id');
   }

}
