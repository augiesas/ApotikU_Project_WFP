<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public $timestamps = false;

    // bisa melihat kategori sesuai dengan kolom category_id
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function transaction()
    {
        return $this->belongsToMany('App\Transaction','detail_transaction','medicine_id','transaction_id')
        ->withPivot('price','quantity','subtotal');
    }
}
