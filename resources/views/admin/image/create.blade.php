@extends('admin.layout.index');
@section('container')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-picture"></i>{{ $title }}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div class="wizard-nav wizard-nav-horizontal">

                <form class="mws-form wzd-default wizard-form wizard-form-horizontal" action="/admin/image/store"
                      method="post" >
                    {{ csrf_field() }}
                    @foreach($good as $k=>$v)
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章id<span class="required">*</span></label>
                        <div class="mws-form-item">
                            <input type="text" name="good_id" value="{{ $v['gid'] }}" class="required email large">
                        </div>
                    </div>

                    <legend class="wizard-label" style="display: none;"><i class="icol-accept"></i></legend>
                    <div class="mws-form-row">
                        <label class="mws-form-label">描述<span class="required">*</span></label>
                        <div class="mws-form-item">
                            <input type="text" name="describe" value="{{ $v['abs'] }}" class="required email large">
                        </div>
                    </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">图片状态<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" name="showimg" selected value="0" class="required email large">
                            </div>
                        </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章图片<span class="required">*</span></label>
                        <div class="mws-form-item">
                            <input type="text" name="image" value="{{ $v['gpic'] }}" class="required email large">
                        </div>
                    </div>
                    @endforeach
                    <div class="mws-form-row">

                        <div class="mws-form-item">
                            <input type="submit" value="提交" class="btn btn-success btn-block">
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <div class="mws-panel-body">
            <ul class="thumbnails mws-gallery">
                @foreach($data as $k=>$v)
                    <li>
                        <span class="thumbnail">{!! $v['image'] !!}</span>
                        <span class="mws-gallery-overlay">

                            <a href="/admin/image/edit/{{ $v['id'] }}" class="mws-gallery-btn"><i class="icon-pencil"></i></a>

                            <a href="/admin/image/destroy/{{ $v['id'] }}" class="mws-gallery-btn"><i class="icon-trash"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>







@endsection