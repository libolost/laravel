<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //模型关联数据表
    protected $table = "users";
    //主键
    protected $primarykey = "id";
    //是否开启时间戳
    public $timestamps = true;
    //批量赋值的属性
    protected $fillable = ['username','password','email','created_at','updated_at','phone'];
    public function getStatusAttribute($value)
    {
        $status = [0 => "禁用",1 => "开启"];
        return $status[$value];
    }
}
