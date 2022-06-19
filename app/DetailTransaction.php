<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    public function medicine()
    {
        return $this->belongsTo('App\Medicine','id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction','id');
    }
}
