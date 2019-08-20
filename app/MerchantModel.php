<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantModel extends Model
{
    protected $primaryKey = 'merchant_id';
    protected $table = 'merchant';

    public function merchantInfo()
    {
        return $this->belongsTo('App\MerchantModel','merchant_id');
    }

//    public function userInfo()
//    {
//        return $this->belongsTo('App\UserModel','merchant_id');
//    }
}
