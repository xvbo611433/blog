<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Good;

class Comment extends Model
{
    // 关联数据表
    public $table = 'blog_comment';

    //数据表主键
    public $primaryKey = 'id';
    public function country()
    {
        return $this->belongsTo('(new Good)','gid');
    }

}
