<?php

namespace App\Models\admin\calc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Category;

class CalcModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id'
    ];

public function category() {
    return $this->belongsTo(Category::class, 'category_id');
}


public function calcCategories() {

    return $this->belongsToMany(CalcCategory::class, 'calc_category_calc_module');

}




}
