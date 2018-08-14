<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'blog_links';

    protected $primaryKey='id';
    
}
