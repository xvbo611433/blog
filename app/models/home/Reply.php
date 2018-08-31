<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /**
         * 与模型关联的数据表。
         *
         * @var string
         */
        protected $table = 'blog_reply';

        protected $primaryKey='id';
}
