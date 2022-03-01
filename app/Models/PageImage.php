<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'page_id',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }
}
