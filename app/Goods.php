<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $primaryKey = 'goods_id';
    protected $table = 'goods';
    public $timestamps = true;

    public function merchantInfo()
    {
        return $this->hasOne('App\MerchantModel','merchant_id','merchant_id');
    }
}
