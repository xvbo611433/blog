@extends('admin.layout.index');
@section('container')
    <!-- 配置文件 -->
    <script type="text/javascript" src="/editor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/editor/ueditor.all.js"></script>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-picture"></i>{{ $title }}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div class="wizard-nav wizard-nav-horizontal">

                <form class="mws-form wzd-default wizard-form wizard-form-horizontal" action="/admin/image"
                      method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}


                        <legend class="wizard-label" style="display: none;"><i class="icol-accept"></i></legend>
                        <div class="mws-form-row">
                            <label class="mws-form-label">轮番图<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="file" name="image" multiple class="required email large">
                            </div>
                        </div>

                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success btn-block btn-amc-mse">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('abc',{
            toolbars: [
                [
                    'undo', //撤销
                    'selectall', //全选
                    'fontfamily', //字体
                    'fontsize', //字号
                    'simpleupload', //单图上传
                    'emotion', //表情
                    'spechars', //特殊字符
                    'forecolor', //字体颜色

                ]
            ]
        });


@endsection