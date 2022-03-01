<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','image'
    ];

    public function photoAlbumImages()
    {
        # code...
        return $this->hasMany(PhotoAlbumImages::class,'photo_album_id','id');
    }
}
