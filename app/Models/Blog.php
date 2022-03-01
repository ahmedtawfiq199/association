<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'sub_title', 'main_image', 'description',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'blog_tags','blog_id','tag_id','id','id');
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class,'blog_id','id');
    }
}
