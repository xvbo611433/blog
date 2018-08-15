@extends('admin.layout.index');
@section('container')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> {{ $title }}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form action="/admin/comment" method='get'>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        关键字:
                        <input type="text" name='search' aria-controls="DataTables_Table_1">
                    </label>

                    <button class='btn btn-info'>搜索</button>
                </div>
            </form>
            <table class="mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>文章ID</th>
                    <th>用户名</th>
                    <th>头像</th>
                    <th>状态</th>
                    <th>评论内容</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                    <tr>
                        <td>{{ $v['id'] }}</td>
                        <td>{{ $v['gid'] }}</td>
                        <td>{{ $v['cname'] }}</td>
                        <td><img style="width: 80px;height:80px;border-radius:60px" src="{{ $v['profile'] }}"></td>
                        <td>{{ $v['status'] }}</td>
                        <td>{!! $v['comment'] !!}</td>
                        <td>{{ $v['created_at'] }}</td>
                        <td>
                            <form action="/admin/comment/{{ $v['id'] }}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input id="ha" type="submit" onclick="return confirm('您确定要删除吗')" class="btn btn-danger" value="删除">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mws-panel-header" id="page_page">
                <span>{!! $data->render() !!}</span>
            </div>
        </div>
    </div>
@endsection