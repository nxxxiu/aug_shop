<?php

namespace App\Http\Controllers;

use App\MerchantModel;
use App\UserModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function u()
    {
        $user_id=2;
        $merchantInfo=UserModel::find($user_id)->merchantInfo->toArray();

        echo "<pre>";print_r($merchantInfo);echo "</pre>";
    }
    public function user()
    {
        $merchant_id=1;
        $userInfo=MerchantModel::find($merchant_id)->UserInfo->toArray();
        echo "<pre>";print_r($userInfo);echo "</pre>";
    }
}
