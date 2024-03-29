<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function medicine()
    {
        return $this->hasMany('App\Medicine','category_id','id');
    }
}
