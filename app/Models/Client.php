<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'client_url'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class,'client_id','id');
    }
}
