@extends('admin.layout.index')

@section('title',$title)
@section('container')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{ $title }}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <div class="mws-form-message success">


                {{session('success')}}

            </div>
            <form action="/admin/good" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                 <select name="page_count" id="">
                    <option value="5"
                        @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 5)
                        selected
                        @endif >5条</option>
                    <option value="15"
                        @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 15)
                            selected
                            @endif >15条</option>
                        <option value="25"
                        @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 25)
                            selected
                            @endif >25条</option>
                        <option value="35"
                        @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 35)
                            selected
                        @endif >35条</option>
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





            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 198px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 266px;" aria-label="Browser: activate to sort column ascending">
                            文章所属类别
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            文章名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            文章内容

                         </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                            更新时间
                        </th>                                                                    

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($data as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        <td class="">
                            {{$v['gid']}}
                        </td>
                        <td class=" ">
                            {{$v['goods_cate']['cname']}}
                        </td>
                        <td class=" ">
                            {{$v['gname']}}
                        </td>
                        <td class=" ">
<<<<<<< Updated upstream
                            {!!$v['content']!!}
=======
                            {!! $v['content'] !!}
>>>>>>> Stashed changes

                        </td>


                         <td class=" ">
                            {{$v['updated_at']}}

                        </td>                                                
                        </td>

                         <td class=" ">
                         <a href="/admin/good/{{$v['gid']}}/edit"><button class="btn btn-warning">修改</button></a>
                    <form action="/admin/good/{{$v['gid']}}" method="post" style="display: inline;">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input id="ha" type="submit"  class="btn btn-danger" value="删除">
                    </form>

                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>





        <div id="page_page">{!! $data->appends($search)->render() !!}</div>


    </div>
</div>

@endsection
@section('js')
<script type="text/javascript">

    $('.mws-form-message').fadeOut(2000);

</script>
@endsection
