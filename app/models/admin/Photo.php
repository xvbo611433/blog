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

    //与相册模型建立关联
    public function photo_types()
    {
        return $this->belongsTo('App\Models\admin\PhotoType', 'photo_id');
    }
}
