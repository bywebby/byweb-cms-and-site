<?php

namespace App\Models\admin\calc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\calc\CalcTitle;

class CalcClasses extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];




public function calcTitle() {

    return $this->hasMany(CalcTitle::class,'calc_classes_id');


}
}
