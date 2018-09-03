@extends('admin.layout.index')
@section('title',$title)
@section('container')
    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>添加文章</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/about" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label">姓名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="name" placeholder="请输入姓名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">x信息</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="message" placeholder="请输入姓名">
                        </div>
                    </div>                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">介绍</label>
                        <div class="mws-form-item">
                            <textarea rows="" cols="" class="large" name="resume" placeholder="介绍"></textarea>
                        </div>
                    </div>                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">个人简介</label>
                        <div class="mws-form-item">
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="content" type="text/plain" ></script>
                        <!-- 配置文件 -->

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript" >
                            var ue = UE.getEditor('container');
                        </script>
                        </div>

                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">头像</label>
                        <div class="mws-form-item">
                            
                                                    <!-- 加载编辑器的容器 -->
                        <script id="tou" name="tou" type="text/plain"></script>
                        <!-- 配置文件 -->

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript" >
                        
                            var ue = UE.getEditor('tou',{toolbars: [['simpleupload']  ]});
        
                  
                        </script>
                        </div>
                    </div>                    
                     <div class="mws-form-row">
                            <input type="submit" value="提交" class="btn btn-success btn-block btn-amc-mse">
                        
                    </div>
            </form>
        </div>
    </div>
@endsection  
