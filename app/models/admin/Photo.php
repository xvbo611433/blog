<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'blog_photos';

    protected $primaryKey = 'id';

		//属于
        public function photo_types()
    {
   	return $this->belongsTo('App\Models\admin\PhotoType','photo_id');
    }
}
