@extends('admin.main')

@section('content')
    <div class="col-lg-12 text-center text-lg-right" style="margin: 4px;">
        <a class="btn btn-success" href="{{'list'}}">Danh sách Slider
        </a>
    </div>

    <div class="card card-primary">
        <!-- form start -->
        <form action ="" method="POST">

            <div class="card-body">
                {{--<div class="row">
                    <div class="col-md-6">--}}
                        <div class="form-group">
                            <label>Tiêu đề Slider</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
                        </div>
                   {{-- </div>--}}
                   {{-- <div class="col-md-6">
                        <div class="form-group">
                              <label>Đường dẫn</label>
                              <input type="text" name="url" value="{{ old('url') }}" class="form-control" id="url">
                        </div>
                    </div>--}}
                {{-- </div>--}}


                <div class="form-group">
                    <label for="menu">Sắp Xếp</label>
                    <input type="number" name="sort_by" value="1" class="form-control" >
                </div>


                <div class="form-group">
                    <label for="menu">Ảnh Slider</label>
                    <input type="file" name="file" class="form-control" id="upload">
                    <div id="image_show"></div>
                    <input type="hidden" name="photo" id="photo">
                </div>

                <div class="form-group">
                    <label>Người đăng</label>
                    <select class ="form-control" name="user" >
                        <option value="0"> Admin </option>
                        <option value="1"> User </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>

            </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm Slider</button>
                </div>

            @csrf
        </form>
    </div>
@endsection


