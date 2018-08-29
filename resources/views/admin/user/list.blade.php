@extends('admin.layout.index');
@section('title', $title)
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
                <div class="mws-form-message success">


                {{session('success')}}

            </div>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>{{ $title }}</span>
        </div>
        <div class="mws-panel-body no-padding dataTables_wrapper">
            <table class="mws-datatable-fn mws-table ">


                <form action="/admin/user" method='get'>
                    <div id="DataTables_Table_1_length" class="dataTables_length">
                        <label>
                            显示
                            <select name="count" size="1" aria-controls="DataTables_Table_1">
                                <option value="10">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>

                            </select>
                            条数据
                        </label>
                    </div>
                    <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>
                            关键字:
                            <input type="text" name='search' aria-controls="DataTables_Table_1">
                        </label>

                        <button class='btn btn-info'>搜索</button>
                    </div>
                </form>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>用户</th>
                    <th>电话</th>
                    <th>邮箱</th>
                    <th>性别</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $k => $v)

                    <tr>
                        <td>{{ $v['id'] }}</td>
                        <td>{{ $v['uname'] }}</td>
                        <td>{{ $v['tel'] }}</td>
                        <td>{{ $v['email'] }}</td>
                        <td>
                            @if($v['sex'] == 1)
                                男
                            @else
                                女
                            @endif
                        </td>
                        <td>
                            <a href="/admin/user/{{ $v['id'] }}/edit"><button class="btn btn-warning">修改</button></a>

                            <form action="/admin/user/{{ $v['id'] }}" method="post" style="display: inline;">
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
                <span>{!! $users->appends($request)->render() !!}</span>
            </div>
        </div>
    </div>


@endsection
