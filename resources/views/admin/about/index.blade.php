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






            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 198px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            姓名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            信息
                        </th>                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            介绍
                        </th>                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            头像
                        </th>  

                      

                                                                   

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($data as $k => $v)

                    <tr >
                        <td class="">
                            {{$v['id']}}
                        </td>
                        <td class=" ">
                            {{$v['name']}}
                        </td>
                        
                        <td class=" ">
                            {{$v['message']}}
                        </td>                        
                        <td class=" ">
                            {{$v['resume']}}
                        </td>
                      
                        <td class=" ">
                   {!!$v['tou']!!}
                        </td>                        
                        




                         <td class=" ">
                         <a href="/admin/about/{{$v['id']}}/edit"><button class="btn btn-danger">修改</button></a>
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








    </div>
</div>

@endsection
@section('js')
<script type="text/javascript">

    $('.mws-form-message').fadeOut(2000);

</script>
@endsection
