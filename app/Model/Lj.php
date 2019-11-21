<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lj extends Model
{
    //
    protected $table='lj';
    public $primaryKey='lj_id';
    protected $fillabl=['lj_name','cate_id','is_hot','is_show','lj_author','lj_email','lj_kwds','lj_desc','lj_img'];
//    protected $guarded=[];
    /*打上时间戳*/
    public $timestamps = false;
}
