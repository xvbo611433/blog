@extends('admin.layout.index');
@section('container')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-picture"></i>{{ $title }}</span>
        </div>

        <div class="mws-panel-body">
            <ul class="thumbnails mws-gallery">
                @foreach($good as $k=>$v)
                    <li>
                        <span class="thumbnail">{!! $v['gpic'] !!}</span>
                        <span class="mws-gallery-overlay">
                            <a href="/admin/image/edit/{{ $v['gid'] }}" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>







@endsection