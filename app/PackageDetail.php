<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    public function getWeddingPackage()
    {
        return $this->belongsTo(WeddingPackage::class,"wedding_package_id");
    }
}
