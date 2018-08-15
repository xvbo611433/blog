@extends('admin.layout.index')

@section('title',$title)
@section('container')
     <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>类别列表</span>
        </div>
 @if(session('success'))               
                <div class="mws-form-message success">


                {{session('success')}}
                </div>
               
        @endif  
                 
    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
					<div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>分类名称</th>
                                    <th>父ID</th>
                                    <th>路径</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                	@foreach($cate_data as $value)
                    <tr>
                        <td class='td'>
                            {{$value['id']}}
                        </td>

                        <td>
                            <u style="cursor:pointer" onclick="member_show()">
                               {{$value['cname']}}
                            </u>
                        </td>
                        <td>
                            <u style="cursor:pointer" onclick="member_show()">
                               {{$value['pid']}}
                            </u>
                        </td>
                        <td >
                            {{$value['path']}}
                        </td>
                        <td>
     					
                    <form action="/admin/cate/{{$value['id']}}" method="post" style="display: inline;">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input id="ha" type="submit"  class="btn btn-danger" value="删除">
                    </form>                            
                            <a href="/admin/cate/childcate/{{$value['id']}}" title="添加子类"> <button class="btn btn-danger">添加子类</button></a>
                        </td>

                                </tr>
					@endforeach
                            </tbody>
                        </table>
                    </div>
     </div>
@endsection
