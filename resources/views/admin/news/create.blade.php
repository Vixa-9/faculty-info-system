@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="/admin/news" method="POST" enctype="multipart/form-data" id="newsForm">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid @enderror" placeholder="News title">
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Summary <span class="text-danger">*</span></label>
                <textarea name="summary" class="form-control @error('summary') is-invalid @enderror" rows="3">{{ old('summary') }}</textarea>
                @error('summary')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Content <span class="text-danger">*</span></label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" id="image" onchange="loadfile(event)">
                <img id="image_show" style="width: 200px; height: 100px; margin-top:8px; display:none;" alt="preview">
                <small class="text-muted">Max size: 8 MB. Allowed: jpeg, bmp, png.</small>
            </div>

            <div class="form-group">
                <label>Published date</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="form-control">
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="active" name="active" value="1" checked>
                    <label for="active" class="custom-control-label">Active (visible on site)</label>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add News</button>
            <a href="/admin/news" class="btn btn-secondary ml-2">Cancel</a>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content', {
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P
        });

        function loadfile(event) {
            var img = document.getElementById('image_show');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.style.display = 'block';
        }

        document.getElementById('newsForm').addEventListener('submit', function(e) {
            var file = document.getElementById('image').files[0];
            if (file && file.size > 8 * 1024 * 1024) {
                e.preventDefault();
                alert('File too large. Maximum size: 8 MB.');
            }
        });
    </script>
@endsection
