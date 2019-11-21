<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table="admin";
    public $primaryKey='admin_id';
    protected $fillable=['admin_name','admin_pwd'];
    public $timestamps = false;
}
