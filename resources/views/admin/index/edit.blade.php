@extends('admin.layout.index');
@section('container')

    @if(session('success'))
                <div class="mws-form-message success">
                    {{ session('success') }};
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

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-pencil"></i>{{ $title }}</span>
        </div>

        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/index/update" method="post">
                {{ csrf_field() }}

                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">原密码</label>
                        <div class="mws-form-item">
                            <input type="text" class="large" name="pwd" value="{{ old('pwd') }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">新密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="large" name="upwd" value="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">确认密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="large" name="repwd" value="">
                        </div>
                    </div>


                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success btn-block">
                    </div>



                </div>
            </form>
        </div>
    </div>
@endsection