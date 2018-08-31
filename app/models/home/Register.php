<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Model;
use App\Models\home\UserInfo;

class Register extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'blog_user';

    protected $primaryKey='id';

    public function info()
    {
        return $this->hasOne((new UserInfo),'uid');
    }

}
