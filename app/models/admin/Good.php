<?php

namespace App\Models\admin;

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

    protected $primaryKey='gid';



    public function goods_cate()
    {
   	return $this->belongsTo('App\Models\admin\Cate','id');
    }


}
