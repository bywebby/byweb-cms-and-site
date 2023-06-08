<?php

namespace App\Models\admin\menu;

use App\Models\admin\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->hasMany(Category::class, 'menu_type_id');
    }
}
