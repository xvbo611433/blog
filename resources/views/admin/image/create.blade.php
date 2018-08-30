@extends('admin.layout.index');
@section('container')

    <div class="mws-panel grid_8">
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
                        <th>描述</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($good as $k=>$v)
                    <tr>
                        <td style="width: 100px;">{{ $v['gid'] }}</td>
                        <td style="width: 100px;height: 100px;">{!! $v['gpic'] !!}</td>
                        <td style="width: 100px;">{{ $v['abs'] }}</td>
                        <td style="width: 100px;">
                            @if($v['status'] == 0)
                                显示
                            @elseif($v['status'] == 1)
                                隐藏
                            @endif
                        </td>
                        <td style="width: 100px;">
                            <a href="/admin/image/edit/{{ $v['gid'] }}" class="mws-gallery-btn"><i class="icon-pencil"></i>删除</a>
                            @if($v['status'] == 0)
                                <a href="/admin/image/hidden/{{ $v['gid'] }}" class="mws-gallery-btn"><i class="icon-refresh"></i>隐藏</a>
                            @elseif($v['status'] == 1)
                                <a href="/admin/image/up/{{ $v['gid'] }}" class="mws-gallery-btn"><i class="icon-refresh"></i>显示</a>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="page_page">{!! $good->render() !!}</div>
            </div>
        </div>
    </div>






@endsection