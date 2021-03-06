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
            <form class="mws-form" action="/admin/good" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">请选择文章所属分类</label>
                        <div class="mws-form-item">
                            <select class="large" name="id">
                                <option value="">--请选择--</option>
                                @foreach($cate_data as $value)
                                    <option value="{{$value['id']}}">{{$value['cname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="gname" placeholder="请输入文章名称">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章摘要</label>
                        <div class="mws-form-item">
                            <textarea rows="" cols="" class="large" name="abs" placeholder="请输入摘要信息"></textarea>
                        </div>
                    </div>                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章内容</label>
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
                        <label class="mws-form-label">缩略图</label>
                        <div class="mws-form-item">
                            
                                                    <!-- 加载编辑器的容器 -->
                        <script id="gpic" name="gpic" type="text/plain"></script>
                        <!-- 配置文件 -->

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript" >
                        
                            var ue = UE.getEditor('gpic',{toolbars: [['simpleupload','insertimage']  ]});
        
                  
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
