@extends('admin.layout.index');
@section('container')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> Simple Table</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>图片</th>
                <th>创建时间</th>
                <th>修改时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr>
                <td>{{ $v['id'] }}</td>
                <td><img width="80px" src="{{ $v['image'] }}" alt=""></td>
                <td>{{ $v['created_at'] }}</td>
                <td>{{ $v['updated_at'] }}</td>
                <td>
                    <a href="/admin/image/{{ $v['id'] }}/edit"><button class="btn btn-warning">修改</button></a>



                    <form action="/admin/image/{{ $v['id'] }}" method="post" style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input id="ha" type="submit" onclick="return confirm('您确定要删除吗')" class="btn btn-danger" value="删除">
                    </form>
                </td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection