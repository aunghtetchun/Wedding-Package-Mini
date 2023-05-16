<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getBlog()
    {
        return $this->hasMany('App\Blog',"category_id");
    }
}
