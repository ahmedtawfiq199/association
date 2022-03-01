<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Websit extends Model
{
    use HasFactory;

    protected $fillable = [
        'websit_title', 'favicon_image', 'logo', 'seo_keyword', 'phone' ,'email' ,'telephone_number'
        ,'facebook','twitter','youtube','instagram','whatsapp','linkedin','behance'
    ];

    protected $appends = [
        'favicon_image_url',
        'logo_url'
    ];

    /**
     * function for return complete favicon image url
     */
    public function getFaviconImageUrlAttribute()
    {
        if(empty($this->favicon_image))
        {
            return asset('storage/images/default-image.jpg');
        }

        return Storage::disk('public')->url($this->favicon_image);
    }


    /**
     * function for return complete logo image url
     */
    public function getLogoUrlAttribute()
    {
        if(empty($this->logo))
        {
            return asset('storage/images/default-image.jpg');
        }

        return Storage::disk('public')->url($this->logo);
    }
}
