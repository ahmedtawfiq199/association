<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,'image' ,'description','service_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function plans()
    {
        # code...
        return $this->hasMany(Plan::class,'sub_service_id','id');
    }
}
