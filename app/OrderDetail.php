<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'detail_id';
    protected $table = 'order_detail';
    public $timestamps = true;
}
