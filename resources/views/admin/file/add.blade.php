@extends('admin.main')

@section('content')
    <div class="col-lg-12 text-center text-lg-right" style="margin: 4px;">
        <a class="btn btn-success" href="{{'list'}}">Danh sách File Upload
        </a>
    </div>

    <div class="card card-primary">
        <!-- form start -->
        <form action ="" method="POST">

            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên Ngành</label> <span>(*)</span>
                            <input type="text" name="major" class="form-control" id="major">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Mã học phần</label> <span>(*)</span>
                            <input type="text" class="form-control" name="code" value="{{ old('code') }}" id="code" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tên học phần</label><span>(*)</span>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Enter ...">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" data-select2-id="65">
                            <label>Học Kỳ</label><span>(*)</span>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="27">I</option>
                                <option data-select2-id="66">II</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Năm học</label><span>(*)</span>
                            <input type="text" class="form-control" name="year" value="{{ old('year') }}" id="year" placeholder="Enter ...">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="menu">File Upload</label><span>(*)</span>
                    <input type="file" name="file" class="form-control" id="upload">
                    <div id="image_show"></div>
                    <input type="hidden" name="photo" id="photo">
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Upload File</button>
            </div>

            @csrf
        </form>
    </div>
@endsection


