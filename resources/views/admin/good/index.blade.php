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

                    <select name="id" lay-filter="aihao">
                        <option value="0">---商品分类---</option>
                        @foreach($cate_data as $value)
                       <option  value="{{$value['id'] or ''}}" >{{$value['cname']}}</option>
                        @endforeach
                    </select>
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
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            缩略图
                        </th>                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            文章简介
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
                            {!! $v['gpic'] !!}
                        </td>                       
                        <td class=" ">
                            {{$v['abs']}}
                        </td>                        
                        


                         <td class=" ">
                            {{$v['updated_at']}}

                        </td>                                                
                        </td>

                         <td class=" ">
                         <a href="/admin/good/{{$v['gid']}}/edit"><button class="btn btn-danger">修改</button></a>
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






        <div id="page_page">{!! $data->appends($search)->render() !!}</div>


    </div>
</div>

@endsection
@section('js')
<script type="text/javascript">

    $('.mws-form-message').fadeOut(2000);

</script>
@endsection
