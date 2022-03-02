<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'sub_title', 'image', 'description'
    ];

    public function images()
    {
        # code...
        return $this->hasMany(SpecialtyImage::class,'specialty_id','id');
    }
}
