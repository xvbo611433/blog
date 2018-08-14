@extends('admin.layout.index');
@section('container')

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
                                <textarea name="comment" rows="" cols="" class="required large"></textarea>
                            </div>
                        </div>

                    </fieldset>



                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success btn-block btn-amc-mse">
                    </div>
                </form>
            </div>
        </div>
@endsection