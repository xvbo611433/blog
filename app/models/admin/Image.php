<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{

    // 关联数据表
    public $table = 'blog_image';

    //数据表主键
    public $primaryKey = 'id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
