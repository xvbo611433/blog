@extends('admin.layout.index')

@section('title',$title)
@section('container')
     <div class="mws-panel grid_8 " >
        <div class="mws-panel-header">
            <span>添加类别</span>
        </div>
        <div class="mws-panel-body no-padding">
            @if (count($errors) > 0)
                <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style='font-size:16px;list-style:none'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                        <div class="mws-form-message success">


                {{session('success')}}

            </div>
            <form class="mws-form " action="/admin/cate" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">分类名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="cname" placeholder="请输入">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">所属类别</label>
                        <div class="mws-form-item">
                        <select class="small" name="pid">
                              <option value="0">--请选择--</option>

                            @foreach($cate_data as $value)
                              <option value="{{$value['id']}}">{{$value['cname']}}</option>
                              @endforeach

                        </select>
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
@section('js')
<script type="text/javascript">

    $('.mws-form-message').fadeOut(5000);

</script>
@endsection

