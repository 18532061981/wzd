<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //
    protected $table='login';
    public $primaryKey='login_id';
//    protected $guarded=[];
    protected $fillable = ['login_email','login_tel','login_pwd'];
    public $timestamps = false;
}
