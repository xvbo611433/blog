@extends('admin.layout.index')

@section('title',$title)
@section('container')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>添加文章</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/good" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">请选择文章所属分类</label>
                        <div class="mws-form-item">
                            <select class="large" name="id">
                                <option value="0">--请选择--</option>
                                @foreach($cate_data as $value)
                                    <option value="{{$value['id']}}">{{$value['cname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="gname">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章内容</label>
                        <div class="mws-form-item">
                            <textarea rows="" cols="" class="large" name="gdesc"></textarea>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章图片</label>
                        <div class="mws-form-item">
                            <td><input name="gpic" id="" type="file"></td>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">文章状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="radio" name="status" value="1" checked> <label>激活</label></li>
                                <li><input type="radio" name="status" value="0"> <label>隐藏</label></li>

                            </ul>
                        </div>
                    </div>
                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-danger">
                        <input type="reset" value="重置" class="btn ">
                    </div>
            </form>
        </div>
    </div>
@endsection  
