<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 关联数据表
    public $table = 'blog_comment';

    //数据表主键
    public $primaryKey = 'id';
}
