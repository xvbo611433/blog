@extends('admin.layout.index')

@section('title',$title)
@section('container')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>添加图片</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/photo" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label">图片名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="photoname" placeholder="请输入要链接名称">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">分类名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="phototype" placeholder="请输入要添加的分类">
                        </div>
                    </div>
                        <div class="mws-form-row">
                        <label class="mws-form-label">图片</label>
                        <div class="mws-form-item">
                            
                                                    <!-- 加载编辑器的容器 -->
                        <script id="photo" name="photo" type="text/plain">
                           
                        </script>
                        <!-- 配置文件 -->

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript" >
                        
                            var ue = UE.getEditor('photo',{toolbars: [['simpleupload']  ]});
        
                  
                        </script>
                        </div>
                    </div> 
                    <div class="mws-form-row">
                        <label class="mws-form-label">图片介绍</label>
                        <div class="mws-form-item">
                            <textarea rows="" cols="" class="large" name="photodesc" placeholder="请输入链接介绍"></textarea>
                        </div>
                    </div>
                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success btn-block">

                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-pictures"></i> Image Gallery</span>
                    </div>
                    <div class="mws-panel-body">
                		<ul class="thumbnails mws-gallery">
                			<li>
                            	<span class="thumbnail"><img src="/admin/example/cyan_hawk.jpg" alt=""></span>
                                <span class="mws-gallery-overlay">
                                    <a href="/admin/example/cyan_hawk.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                    <a href="#" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                    <a href="#" class="mws-gallery-btn"><i class="icon-trash"></i></a>
                                </span>
                			</li>
             			
                		</ul>
                    </div>
				</div>


@endsection  