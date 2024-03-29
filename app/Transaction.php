<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function medicine()
    {
        return $this->belongsToMany('App\Medicine', 'detail_transactions','medicine_id','transaction_id')->withPivot('price','quantity','subtotal');
    }

    public function insertMedicine($cart, $user)
    {
        $total=0;
        foreach($cart as $id=>$detail){
            $total += $detail['price'] * $detail['quantity'];
            $this->medicine()->attach($id,['quantity'=>$detail['quantity'], 'price'=>$detail['price']]);
        }

        return $total;
    }

    public function detailTransaction()
    {
        return $this->hasMany('App\DetailTransaction','transaction_id','id');
    }
}
