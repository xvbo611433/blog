@extends('admin.layout.index');
@section('container')


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
            <form class="mws-form" action="/admin/user" method="post">
                {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">用户</label>
                        <div class="mws-form-item">
                            <input type="text" class="large" name="uname" value="{{ old('uname') }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="large" name="upwd" value="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">确认密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="large" name="password" value="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">电话</label>
                        <div class="mws-form-item">
                            <input type="text" class="large" name="tel" value="{{ old('tel') }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">邮箱</label>
                        <div class="mws-form-item">
                            <input type="email" class="large" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">
                            <input type="radio"  name="status" checked value="1">激活
                            <input type="radio"  name="status" value="2">未激活
                        </div>
                    </div>
                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-success btn-block btn-amc-mse">
                    </div>



                </div>
            </form>
        </div>

@endsection