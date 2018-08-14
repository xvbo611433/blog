<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // 关联数据表
    public $table = 'user';

    //数据表主键
    public $primaryKey = 'id';
}
