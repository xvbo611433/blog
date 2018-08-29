@extends('admin.layout.index')

@section('title',$title)
@section('container')
     <div class="mws-panel grid_8 " >
        <div class="mws-panel-header">
            <span>添加类别</span>
        </div>
        <div class="mws-panel-body no-padding">
            @if(session('success'))
            <div class="mws-form-message success">
                {{session('success')}}
            </div>
            @else
            <div class="mws-form-message error">
                {{session('error')}}
            </div>
            @endif
            <form class="mws-form " action="/admin/photo/type" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">相册名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="phototype" placeholder="请输入要添加的相册名">
                        </div>
                    </div>
                        <div class="mws-form-row">
                        <label class="mws-form-label">相册封面</label>
                        <div class="mws-form-item">
                            
                                                    <!-- 加载编辑器的容器 -->
                        <script id="cover" name="cover" type="text/plain">
                           
                        </script>
                        <!-- 配置文件 -->

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript" >
                        
                            var ue = UE.getEditor('cover',{toolbars: [['simpleupload']  ]});
        
                  
                        </script>
                        </div>
                    </div> 

                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success btn-block">

                </div>
            </form>
        </div>

    </div>

@endsection  