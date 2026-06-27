@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action =""  method="POST" enctype="multipart/form-data" id="articleForm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Article Title</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="Nhập tên bài viết">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Summary</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="content" class="form-control ckeditor">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Header image</label>
                <input type="file" name="image" class="form-control" id="image" onchange="loadfile(event)">
                <img id="image_show" style="width: 200px; height: 100px" alt="image">
                <small class="text-muted">Max size: 8 MB. Allowed: jpeg, bmp, png.</small>
            </div>

            <div class="form-group">
                <label>Posted by</label>
                    <select class ="form-control" name="user" >
                        <option value="0"> Admin </option>
                        <option value="1"> User </option>
                    </select>
            </div>

            <div class="form-group">
                <label>Featured News</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="hot" name="hot" value="1" checked="">
                        <label for="hot" class="custom-control-label">Yes</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="no_hot" name="hot">
                        <label for="no_hot" class="custom-control-label">No</label>
                    </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Post</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content', {
           enterMode : CKEDITOR.ENTER_BR,
           shiftEnterMode : CKEDITOR.ENTER_P
        });

        function loadfile(event) {
            document.getElementById('image_show').src = URL.createObjectURL(event.target.files[0]);
        }

        document.getElementById('articleForm').addEventListener('submit', function(e) {
            var file = document.getElementById('image').files[0];
            if (file && file.size > 8 * 1024 * 1024) {
                e.preventDefault();
                alert('File too large. Maximum size: 8 MB.');
            }
        });
    </script>
@endsection
