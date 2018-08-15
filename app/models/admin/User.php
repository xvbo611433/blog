<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    // 关联数据表
    public $table = 'user';

    //数据表主键
    public $primaryKey = 'id';
}
