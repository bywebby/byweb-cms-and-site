<?php

namespace App\Models\admin\calc;

use App\Models\admin\calc\CalcCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\calc\CalcTitle;
use App\Models\admin\calc\CalcModule;


class CalcItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'calc_title_id',
        'price',
//        'calc_module_id',
        'calc_category_id',
        'checked',
        'status'
    ];


    public function calcTitle() {
        return $this->belongsTo(CalcTitle::class, 'calc_title_id');
    }

    public function calcModule() {
        return $this->belongsTo(CalcModule::class, 'calc_module_id');
    }

    public function calcCategory() {
        return $this->belongsTo(CalcCategory::class, 'calc_category_id');
    }




}
