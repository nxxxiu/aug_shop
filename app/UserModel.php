<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'user';

    public function merchantInfo()
    {
        return $this->hasOne('App\MerchantModel','user_id','user_id');
    }
}
