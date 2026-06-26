@extends('admin.main')

@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action ="" method="POST">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tiêu đề Slider</label>
                            <input type="text" name="name" value="{{ $slider->name }}" class="form-control" id="name">
                        </div>
                    </div>
                    {{--<div class="col-md-6">
                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <input type="text" name="url" value="{{ $slider->url }}" class="form-control" id="url">
                        </div>
                    </div>--}}
                </div>


                <div class="form-group">
                    <label for="menu">Sắp Xếp</label>
                    <input type="number" name="sort_by" value="{{ $slider->sort_by }}" class="form-control" >
                </div>


                <div class="form-group">
                    <label for="menu">Ảnh</label>
                    <input type="file" name="file" class="form-control" id="upload">
                    <div id="image_show">
                        <a href="{{ $slider->photo}}" target="_blank">
                            <img src="{{ $slider->photo}}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="photo" value="{{ $slider->photo }}" id="photo">
                </div>

                <div class="form-group">
                    <label>Người đăng</label>
                    <select class ="form-control" name="user" >
                        <option value="{{$slider->user}}"> Admin </option>
                        <option value="{{$slider->user}}"> User </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                              {{$slider->active == 1 ? 'checked':''}}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                            {{$slider->active == 0 ? 'checked':''}}>
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật Slider</button>
            </div>

            @csrf
        </form>
    </div>
@endsection


