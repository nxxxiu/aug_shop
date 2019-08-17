<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantModel extends Model
{
    protected $primaryKey = 'merchant_id';
    protected $table = 'merchant';
    public function userInfo()
    {
        return $this->belongsTo('App\UserModel','user_id');
    }
}
