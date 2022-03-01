<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id', 'blog_id',
    ];

    public $timestamps = false;


    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id','id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id','id');
    }
}
