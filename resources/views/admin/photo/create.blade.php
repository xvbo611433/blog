@extends('admin.layout.index')

@section('title',$title)
@section('container')





    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>添加图片</span>
        </div>
            @if(session('success'))
            <div class="mws-form-message success">
                {{session('success')}}
            </div>
            @else
            <div class="mws-form-message error">
                {{session('error')}}
            </div>
            @endif

      
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/photo/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label">图片名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="photoname" placeholder="请给图片命名">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">相册名称</label>

   

                        <div class="mws-form-item">
                        <select class="small" name="photo_id">
                              <option value="0">--请选择相册--</option>

                            @foreach($data as $v)
                              <option  value="{{$v['photo_id']}}">{{$v['phototype']}}</option>
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
                        <label class="mws-form-label">图片</label>
                        <div class="mws-form-item">
                            
                                                    <!-- 加载编辑器的容器 -->
                        <script id="photo" name="photo" type="text/plain">
                           
                        </script>
                        <!-- 配置文件 -->

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript" >
                        
                            var ue = UE.getEditor('photo',{toolbars: [['simpleupload','insertimage']]});
        
                  
                        </script>
                        </div>
                    </div> 
                    <div class="mws-form-row">
                        <label class="mws-form-label">图片介绍</label>
                        <div class="mws-form-item">
                            <textarea rows="" cols="" class="large" name="photodesc" placeholder="请输入图片介绍"></textarea>
                        </div>
                    </div>
                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success btn-block">

                    </div>
                </div>
            </form>
        </div>
    </div>

        <div class="mws-panel-body">

            <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>我的相册</span>
        </div>
            <ul class="thumbnails mws-gallery">
                @foreach($phototype as $v)
                    <li>
                        <span class="thumbnail">{!!$v['cover']!!}</span>
                        <span class="thumbnail">{{$v['phototype']}}</span>
                        <span class="mws-gallery-overlay">

                            <a href="/admin/photo/index/{{ $v['photo_id'] }}" class="mws-gallery-btn"><i class="icon-pencil"></i></a>

                           <a href="/admin/photo/destroy/{{ $v['photo_id'] }}" class="mws-gallery-btn"><i class="icon-trash"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>


@endsection  