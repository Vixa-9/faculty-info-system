@extends('admin.main')

@section('content')
    <div class="row align-items-center py-3 px-lg-12" style="margin: 1px;" style="margin: 2px;">
        <div class="col-md-8 offset-md-2">
            <form action="search" method="get">
                <div class="input-group">
                    <input type="search" name="keyword" id ="keyword" class="form-control form-control-small" placeholder="Tìm kiếm">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-small btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                </div>
            </form>
        </div>
        <a class="btn btn-success" href="{{'add'}}">Thêm Slider Mới
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:50px">STT</th>
            <th style="width:50px">ID</th>
            <th style="width: 300px">Tiêu đề</th>
            <th>Ảnh</th>
            <th style="width:100px">Trạng thái</th>
            <th style="width:150px">Cập nhật</th>
            <th style="width:150px">Người đăng</th>
            <th style="width:50px">Edit</th>
            <th style="width:50px">Delete</th>
            {{--<th style="width: 100px">&nbsp;</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $key => $slider)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>
                    <div id="image_show">
                        <a href="{{ $slider->photo}}" target="_blank">
                            <img src="{{ $slider->photo}}" width="150px">
                        </a>
                    </div>
                </td>
                <input type="hidden" name="photo" value="{{ $slider->photo}}" id="photo">
                <td>{!! \App\Helpers\Helper::active($slider->active)!!}</td>
                <td>{{ $slider->updated_at }}</td>
                <td>{!! \App\Helpers\Helper::user($slider->user)!!}</td>

                <td>
                    <a class = "btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}'">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $slider->id }}, '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $sliders->links("pagination::bootstrap-4") !!}
    </div>
@endsection
<style>
    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -7.5px;
        margin-left: -7.5px;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
</style>

