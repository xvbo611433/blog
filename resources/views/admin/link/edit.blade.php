@extends('admin.layout.index')

@section('title',$title)
@section('container')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>添加友情链接</span>
                    </div>
                    <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/link/{{$data['id']}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                    		<div class="mws-form-inline">
                   		
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">友情链接名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="LinkName" value="{{$data['LinkName']}}">
                    				</div>
                    			</div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">友情链接地址</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name="LinkAddress" value="{{$data['LinkAddress']}}">
                                        </div>
                                   </div>                 			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">友情链接图片</label>
                    				<img width="100px" style="padding-left: 20px" src="{{$data['LinkInfo']}}">
									<div class="mws-form-item">
								    <td><input  id="" type="file" name="LinkInfo" value="{{$data['LinkInfo']}}" ></td>
								  	</div>
                    			</div>   

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">友情链接介绍</label>
                                        <div class="mws-form-item">
                                             <textarea rows="" cols="" class="large" name="Explain">{{$data['Explain']}}</textarea>
                                        </div>
                                   </div>   
                    		<div class="mws-button-row">
                    			<input type="submit" value="提交" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection  
