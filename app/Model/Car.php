<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $table='car';
    public $primaryKey='car_id';
//    protected $guarded=[];
    protected $fillable = ['goods_id','goods_price','goods_num','is_del','buy_number'];
    public $timestamps = false;
}
