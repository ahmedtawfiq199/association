<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'client_id', 'service_id', 'main_image', 'during_date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class,'project_id','id');
    }
}
