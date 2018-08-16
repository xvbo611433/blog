@extends('admin.layout.index')

@section('title',$title)
@section('container')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>修改文章</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/good/{{$data['gid']}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">请选择文章所属分类</label>
                        <div class="mws-form-item">
                            <select class="large" name="id">
                                @foreach($cate_data as $value)
                                    <option value="{{$value['id']}}"
                                            @if($data['id'] == $value['id']) selected @endif>{{$value['cname']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="gname" value="{{$data['gname']}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章内容</label>
                        <div class="mws-form-item">
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="content" type="text/plain">
                                {!! $data['content'] !!}
                            </script>
                            <!-- 配置文件 -->

                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container');
                            </script>
                        </div>
                    </div>


                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success">
                        <input type="reset" value="重置" class="btn ">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection  
