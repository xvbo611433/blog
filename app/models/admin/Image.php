<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // 关联数据表
    public $table = 'blog_image';

    //数据表主键
    public $primaryKey = 'id';
}
