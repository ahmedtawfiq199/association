<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialtyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image' ,'specialty_id'
    ];

    public function specialty()
    {
        # code...
        return $this->belongsTo(Specialty::class,'specialty_id','id');
    }
}
