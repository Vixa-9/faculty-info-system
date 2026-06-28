@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="col-lg-12 text-center text-lg-right" style="margin: 4px;">
    <a class="btn btn-success" href="/admin/slides/list">Slides List</a>
</div>

<div class="card card-primary">
    <form action="/admin/slides/add" method="POST" enctype="multipart/form-data" id="slideForm">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Slide Title <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label>Image <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" onchange="loadfile(event)">
                <img id="image_show" style="width: 200px; height: 100px; margin-top:8px; display:none;" alt="preview">
                <small class="text-muted">Max size: 8 MB. Allowed: jpeg, bmp, png.</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Link</label>
                <input type="text" name="url" value="{{ old('url') }}" class="form-control" id="url">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Slide</button>
        </div>
    </form>
</div>
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

        document.getElementById('slideForm').addEventListener('submit', function(e) {
            var file = document.getElementById('image').files[0];
            if (file && file.size > 8 * 1024 * 1024) {
                e.preventDefault();
                alert('File too large. Maximum size: 8 MB.');
            }
        });
    </script>
@endsection
