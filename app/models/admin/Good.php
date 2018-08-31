<?php

namespace App\Models\admin;

use App\Models\admin\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'blog_goods';

    protected $primaryKey = 'gid';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    // 与文章模型关联
    public function goods_cate()
    {
        return $this->belongsTo('App\models\admin\Cate', 'id');
    }

    // 一个文章对多个评论
    public function goods_comment()
    {
        return $this->hasMany((new Comment), 'gid');
    }

}
