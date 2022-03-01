<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id', 'page_id',
    ];

    public $timestamps = false;

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id','id');
    }
}
