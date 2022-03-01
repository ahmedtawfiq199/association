<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','phone','service_id','description','status','note'
    ];

    public function service()
    {
        # code...
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
