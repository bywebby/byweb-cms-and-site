<?php

namespace App\Models\admin\calc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\calc\CalcModule;

class CalcTitle extends Model
{
    use HasFactory;

    protected $fillable = ['title','calc_classes_id','calc_type_id'];

    public function modules() {
        return $this->hasMany(CalcModule::class);
    }




}
