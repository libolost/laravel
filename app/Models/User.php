<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //模型关联数据表
    protected $table = "user";
    //是否开启时间戳
    public $timestamps = true;
    //
    protected $fillable = ['username','password','email','status','token','phone'];
    public function getStatusAttribute($value)
    {
        $status = [0 => "禁用",1 => "开启"];
        return $status[$value];
    }
}
