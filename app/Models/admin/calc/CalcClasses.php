<?php

namespace App\Models\admin\calc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalcClasses extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];
}
