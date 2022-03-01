<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,'price' ,'sub_service_id' ,'type' ,'during'
    ];

    public function subService()
    {
        # code...
        return $this->belongsTo(SubService::class,'sub_service_id','id');
    }

    public function features()
    {
        # code...
        return $this->hasMany(Feature::class,'plan_id','id');
    }
}
