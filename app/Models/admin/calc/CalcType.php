<?php

namespace App\Models\admin\calc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\calc\CalcTitle;

class CalcType extends Model
{
    use HasFactory;

    protected $fillable = ['title'];




    public function calcTitle() {

        return $this->hasMany(CalcTitle::class,'calc_classes_id');


    }



}
