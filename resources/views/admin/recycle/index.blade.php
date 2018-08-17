@extends('admin.layout.index')

@section('title',$title)
@section('container')
    <div class="mws-panel grid_8 mws-collapsible">
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span><i class="icon-pictures"></i>Image</span>
            </div>
            <div class="mws-panel-inner-wrap">

                <div class="mws-panel-body">
                    <div id="DataTables_Table_0_length" class="dataTables_length">
                        <label>

                            <table class="mws-table mws-datatable dataTable" id="DataTables_Table_0"
                                   aria-describedby="DataTables_Table_0_info">
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($data as $k=>$v)
                                    <tr class="odd" >
                                        <td class="  sorting_1">{{ $v['gid'] }}</td>
                                        <td class=" " style="width: 300px;height: 50px;overflow:hidden">{{ $v['gname'] }}</td>
                                        <td class=" ">{{ $v['id'] }}</td>

                                        <td class=" " >{!! $v['gpic'] !!}</td>
                                        <td class=" " >{!! $v['abs'] !!}</td>

                                        <td class=" ">
                                        <span class="btn-group">

                                            <a href="/admin/recycle/rollback/{{ $v['id'] }}" class="btn btn-small"><i
                                                        class="icon-refresh"></i>恢复</a>
                                            <a href="/admin/recycle/destroytime/{{ $v['id'] }}" class="btn btn-small"
                                               onclick="return confirm('您确定要永久删除吗')"><i class="icon-trash"></i>删除</a>
                                        </span>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>

                        </label>
                    </div>
                    <ul class="thumbnails mws-gallery">
                        @foreach($images as $k=>$v)
                            <li>
                                <span class="thumbnail"><img src="{{ $v['image'] }}" alt=""></span>
                                <span class="mws-gallery-overlay">

                            <a href="/admin/recycle/Rollback/{{  $v['id'] }}" class="mws-gallery-btn"><i
                                        class="icon-repeat"></i></a>

                            <a href="/admin/image/destroy/{{ $v['id'] }}" class="mws-gallery-btn"><i
                                        class="icon-trash"></i></a>
                        </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div style="float:right">

                <a href="/admin/recycle/recover" class="btn btn-small">
                    <button class="btn btn-success">恢复所有</button>
                </a>
                <a href="/admin/recycle/destroy" class="btn btn-small"
                   onclick="return confirm('您确定要这么做吗')">
                    <button class="btn btn-danger">删除全部</button>
                </a>
            </div>


        </div>
@endsection
