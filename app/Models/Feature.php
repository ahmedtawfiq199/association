<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,'value','plan_id'
    ];


    public function plan()
    {
        # code...
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
}
