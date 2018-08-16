@extends('admin.layout.index');
@section('container')

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
                    <div class="mws-form-row">

                        <div class="mws-form-item">
                            <input type="submit" value="提交" class="btn btn-success">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- 实例化编辑器 -->


@endsection