<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function getCategory()
    {
        return $this->belongsTo('App\Category',"category_id");
    }
}
