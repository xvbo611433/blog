<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\admin\Comment;


class Good extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'blog_goods';

    protected $primaryKey='gid';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    // 多个文章对一个类别
    public function goods_cate()
    {
   	return $this->belongsTo('App\Models\admin\Cate','id');
    }

    // 一个文章对多个评论
    public function goods_comment()
    {
        return $this->hasMany((new Comment),'gid');
    }


}
