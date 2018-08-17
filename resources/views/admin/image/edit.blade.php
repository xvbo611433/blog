@extends('admin.layout.index');
@section('container')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-picture"></i>{{ $title }}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div class="wizard-nav wizard-nav-horizontal">

                <form class="mws-form" action="/admin/image/{{ $data['id'] }}"
                      method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="mws-form-row">
                        <label class="mws-form-label">描述<span class="required">*</span></label>
                        <div class="mws-form-item">
                            <input type="text" name="describe" value="{{ $data['describe'] }}" class="required email large">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">轮番图<span class="required">*</span></label>

                        <div class="mws-form-item">
                            <img width="100px" src="{{ $data['image'] }}" alt="">
                            <input type="file" name="image" value="{{ $data['image'] }}" class="required email large">

                        </div>
                    </div>

                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success btn-block btn-amc-mse">
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection