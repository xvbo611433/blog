<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class PhotoType extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'blog_phototype';

    protected $primaryKey = 'photo_id';

    //和图片模型建立关联
    public function photo_types()
    {
        return $this->hasMany('Photo', 'photo_id', 'id');
    }
}
