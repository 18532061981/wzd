<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table='brand';
    public $primaryKey='brand_id';
//    protected $fillabl=['brand_name','brand_url','brand_logo','is_show'];
    protected $guarded=[];
    /*打上时间戳*/
    public $timestamps = false;
}
