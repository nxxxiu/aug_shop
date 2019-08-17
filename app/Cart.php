<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cart_id';
    protected $table = 'cart';
    public $timestamps = true;

    public function goodsInfo()
    {
        return $this->hasOne('App\Goods','goods_id','goods_id');

    }
}
