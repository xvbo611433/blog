@extends('admin.layout.index');
@section('container')
<!-- 配置文件 -->
<script type="text/javascript" src="/editor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/editor/ueditor.all.js"></script>

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-magic"></i>{{ $title }}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div class="wizard-nav wizard-nav-horizontal">

                <form class="mws-form wzd-default wizard-form wizard-form-horizontal" action="/admin/comment" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset class="wizard-step mws-form-inline" data-wzd-id="wzd_1ckocpfth1gjdam2evo_0"
                              style="display: block;">
                        <legend class="wizard-label" style="display: none;"><i class="icol-accept"></i></legend>
                        <div id="" class="mws-form-row">
                            <label class="mws-form-label">用户 <span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" name="cname" class="required large" value="">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">头像<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="file" name="profile" class="required email large">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">状态<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="radio" name="status"  checked value="1">启用&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="status" value="2">禁用
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">内容<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <script id="abc" name="comment" type="text/plain"></script>
                            </div>
                        </div>
                        <div class="mws-form-row">
                                <div class="mws-form-item">
                                <input type="submit" value="提交" class="btn btn-success">
                            </div>
                        </div>

                    </fieldset>

                </form>
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
        </script>
@endsection