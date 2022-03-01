<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoAlbumImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'image' ,'photo_album_id'
    ];

    public function photoAlbum()
    {
        # code...
        return $this->belongsTo(PhotoAlbum::class,'photo_album_id','id');
    }
}
