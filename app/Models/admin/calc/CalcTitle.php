<?php

namespace App\Models\admin\calc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\calc\CalcModule;
use App\Models\admin\calc\CalcClasses;
use App\Models\admin\calc\CalcType;

class CalcTitle extends Model
{
    use HasFactory;

    protected $fillable = ['title','calc_classes_id','calc_type_id'];

    public function modules() {
        return $this->hasMany(CalcModule::class);
    }


    public function calcClasse() {

        return $this->belongsTo(CalcClasses::class,'calc_classes_id');


    }


    public function calcType() {

        return $this->belongsTo(CalcType::class,'calc_type_id');


    }




}
