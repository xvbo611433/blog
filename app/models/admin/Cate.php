<?php

namespace App\Models\admin;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Good;

class Cate extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'blog_cate';

    protected $primaryKey='id';

            /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['cname','pid','status','path'];
        //获取所有分类
    public static function  getDatecate()
		{  
			$cate_data =DB::select("select *,concat(path,',',id) as paths from blog_cate order by paths asc");  
		     foreach ($cate_data as $key => $value) 
		     	{
		         //统计path

		         $n = substr_count($value['path'],',');


		         //处理cname
		         $cate_data[$key]['cname'] = str_repeat('&nbsp;',$n*5).'-----|'.$value['cname'];
		     }
		      return $cate_data;
		}



}
