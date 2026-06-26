@extends('admin.main')

@section ('head')
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
@endsection

@section('content')
    <div class="col-lg-12 text-center text-lg-right" style="margin: 4px;">
        <a class="btn btn-success" href="{{'list'}}">Danh sách bài viết
        </a>
    </div>

    <div class="card card-primary">
        <!-- form start -->
        <form action ="" method="POST">

            <div class="card-body">
                <div class="form-group">
                    <label>Tiêu đề bài viết</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="menu" placeholder="Nhập tiêu đề bài viết">
                </div>

                <div class="form-group">
                    <label>Chuyên mục</label>
                    <select class ="form-control" name="menu_id">
                        <option value="0"> Chuyên mục cha </option>
                        @foreach($menus as $menu)
                            <option value = "{{$menu->id}}" >{{$menu->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea name ="description" class ="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="content" id="content" class ="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="menu">Ảnh Bài Viết</label>
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

                <div class=" "form-group>
                    <label>Tin nổi bật</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="hot" name="hot" value="1" checked="">
                        <label for="hot" class="custom-control-label">Có</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="no_hot" name="hot">
                        <label for="no_hot" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Bài Viết</button>
            </div>
            @csrf
        </form>
    </div>
@endsection

@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
@endsection
