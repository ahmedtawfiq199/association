<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['menu_name','link'];

    public function pages(){
        return $this->hasMany(Page::class);
    }

    public function subMenus(){
        return $this->hasMany(SubMenu::class);
    }
}
