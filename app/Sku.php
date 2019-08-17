<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $primaryKey = 'sku_id';
    protected $table = 'sku';
    public $timestamps = true;
}
