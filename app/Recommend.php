<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    public function getWeddingPackage()
    {
        return $this->belongsTo('App\WeddingPackage',"wedding_package_id");
    }
}
