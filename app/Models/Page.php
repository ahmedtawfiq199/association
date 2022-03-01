<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'sub_title', 'main_image', 'description','sub_menus_id','menu_id'
    ];

    public function images()
    {
        return $this->hasMany(PageImage::class,'page_id','id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'page_tags','page_id','tag_id','id','id');
    }
}
