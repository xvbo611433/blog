@extends('admin.layout.index')

@section('title',$title)
@section('container')
    <div class="mws-panel grid_8 mws-collapsible">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> Browser Engines</span>
            <div class="mws-collapse-button mws-inset"><span></span></div>
        </div>
        <div class="mws-panel-inner-wrap">
            <div class="mws-panel-body no-padding">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                    <div id="DataTables_Table_0_length" class="dataTables_length"><label>Show <select size="1"
                                                                                                      name="DataTables_Table_0_length"
                                                                                                      aria-controls="DataTables_Table_0">
                                <option value="10" selected="selected">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                    <div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Search: <input type="text"
                                                                                                        aria-controls="DataTables_Table_0"></label>
                    </div>
                    <table class="mws-table mws-datatable dataTable" id="DataTables_Table_0"
                           aria-describedby="DataTables_Table_0_info">
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($data as $k=>$v)
                            <tr class="odd">
                                <td class="  sorting_1">{{ $v['id'] }}</td>
                                <td class=" ">{{ $v['uname'] }}</td>
                                <td class=" ">{{ $v['sex'] }}</td>
                                <td class=" ">{{ $v['email'] }}</td>
                                <td class=" "><span class="badge badge-info">{{ $v['tel'] }}</span></td>
                                <td class=" ">
                                        <span class="btn-group">

                                            <a href="/admin/recycle/rollback/{{ $v['id'] }}" class="btn btn-small"><i class="icon-refresh"></i>恢复</a>
                                            <a href="/admin/recycle/destroytime/{{ $v['id'] }}" class="btn btn-small" onclick="return confirm('您确定要永久删除吗')"><i class="icon-trash"></i>删除</a>
                                        </span>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    <div class="mws-button-row">
                        <a href="/admin/recycle/recover" class="btn btn-small"><button class="btn btn-success" >恢复所有</button></a>
                        <a href="/admin/recycle/destroy" class="btn btn-small" onclick="return confirm('您在执行危险操作,您确定要这么做吗')"><button class="btn btn-danger" >删除全部</button></a>
                    </div>
                    <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 20 entries</div>
                    <div class="dataTables_paginate paging_two_button" id="DataTables_Table_0_paginate"><a
                                class="paginate_disabled_previous" tabindex="0" role="button"
                                id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0">Previous</a><a
                                class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next"
                                aria-controls="DataTables_Table_0">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
