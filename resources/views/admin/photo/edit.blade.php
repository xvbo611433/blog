@extends('admin.layout.index')
@section('title',$title)
@section('container')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>修改图片信息</span>
        </div>


      
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/photo/update/{{$data['id']}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label">图片名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="photoname" value="{{$data['photoname']}}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">相册名称</label>

   

                        <div class="mws-form-item">
                        <select class="small" name="photo_id">
                              <option value="0">--请选择相册--</option>

                            @foreach($phototype as $v)
                              <option   @if($data['photo_id'] == $v['photo_id']) selected @endif}}>{{$v['photo_id']}}</option>
                              @endforeach

                        </select>                            
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label"></label>
                            <div class="mws-form-item">
                                <a href="/admin/photo/type">添加相册</a>
                            </div>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">图片介绍</label>
                        <div class="mws-form-item">
                             <textarea rows="" cols="" class="large" name="photodesc">{{$data['photodesc']}}</textarea>
                        </div>
                    </div>
                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success btn-block">

                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection  