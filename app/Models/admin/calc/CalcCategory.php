<?php

namespace App\Models\admin\calc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalcCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'calc_classes_id'];


    public function calcModules() {

        return $this->belongsToMany(CalcModule::class, 'calc_category_calc_module')->withTimeStamps();

    }

    public function calcItems() {

        return $this->hasMany(CalcItem::class, 'calc_category_id');

    }




}
