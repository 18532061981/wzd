<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table='cate';
    public $primaryKey='cate_id';
//    protected $guarded=[];
    protected $fillable = ['cate_name','cate_show','parent_id'];
    public $timestamps = false;
}
