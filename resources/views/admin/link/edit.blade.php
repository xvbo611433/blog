@extends('admin.layout.index')

@section('title',$title)
@section('container')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>添加友情链接</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/link/{{$data['id']}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="LinkName" value="{{$data['LinkName']}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接地址</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="LinkAddress" value="{{$data['LinkAddress']}}">
                        </div>
                    </div>
                        <div class="mws-form-row">
                        <label class="mws-form-label">LOGO</label>
                        <div class="mws-form-item">
                            
                                                    <!-- 加载编辑器的容器 -->
                        <script id="LinkInfo" name="LinkInfo" type="text/plain">
                           {!!$data['LinkInfo']!!}
                        </script>
                        <!-- 配置文件 -->

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript" >
                        
                            var ue = UE.getEditor('LinkInfo',{toolbars: [['simpleupload']  ]});
        
                  
                        </script>
                        </div>
                    </div> 

                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接介绍</label>
                        <div class="mws-form-item">
                            <textarea rows="" cols="" class="large" name="Explain">{{$data['Explain']}}</textarea>
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
