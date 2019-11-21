<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $table='goods';
    public $primaryKey='goods_id';
//    protected $guarded=[];
    protected $fillable = ['goods_name','goods_price','goods_num','goods_desc','goods_img','is_hot','is_show','is_new','brand_id','cate_id'];
    public $timestamps = false;
}
