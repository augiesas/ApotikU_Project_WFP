<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public $timestamps = false;
    protected $table='medicines';
    // bisa melihat kategori sesuai dengan kolom category_id
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function transaction()
    {
        return $this->belongsToMany('App\Transaction','detail_transactions','transaction_id','medicine_id')->withPivot('price','quantity','subtotal');
    }

    public function detailTransaction()
    {
        return $this->hasMany('App\DetailTransaction','medicine_id','id');
    }
}
