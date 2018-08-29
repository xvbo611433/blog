@extends('admin.layout.index')
@section('title',$title)
@section('container')

            @if(session('success'))
            <div class="mws-form-message success">
                {{session('success')}}
            </div>
            @else
            <div class="mws-form-message error">
                {{session('error')}}
            </div>
            @endif
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
                            相册名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            图片名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            图片
                        </th>                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            图片介绍
                        </th>  

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                            上传时间
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
                            {{$v['id']}}
                        </td>
                        <td class=" ">
                            {{$v['photo_types']['phototype']}}
                        </td>
                        <td class=" ">
                            {{$v['photoname']}}
                        </td>
                         <td class=" ">
                            {!! $v['photo'] !!}
                        </td>                       
                        <td class=" ">
                            {{$v['photodesc']}}
                        </td>                        
                        
                         <td class=" ">
                            {{$v['updated_at']}}

                        </td>                                                
                        </td>

                         <td class=" ">
                         <a href="/admin/photo/edit/{{$v['id']}}"><button class="btn btn-danger">修改</button></a>
                    <form action="/admin/photo/delete/{{ $v['id'] }}" method="post" style="display: inline;">
                    {{csrf_field()}}

                    <input id="ha" type="submit"  class="btn btn-danger" value="删除">
                    </form>

                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
@endsection  