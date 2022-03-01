<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function page()
    {
    return $this->belongsToMany(Page::class,'page_tags','tag_id','page_id','id','id')
                ->using(PageTag::class);
    }

    public function blog()
    {
    return $this->belongsToMany(Blog::class,'blog_tags','tag_id','blog_id','id','id');
    }
}
