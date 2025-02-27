<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function Brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
