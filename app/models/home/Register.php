<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'blog_user';

    protected $primaryKey='id';
}
