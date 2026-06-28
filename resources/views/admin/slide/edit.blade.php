@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="card card-primary">
    <form action="/admin/slides/edit/{{ $slide->id }}" method="POST" enctype="multipart/form-data" id="slideEditForm">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Slide Title</label>
                <input type="text" name="name" value="{{ $slide->name }}" class="form-control" id="name">
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="content" class="form-control">{{ $slide->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                @if($slide->image)
                    <div class="mb-2">
                        <img src="{{ $slide->image }}" style="width:150px; height:100px; object-fit:cover;" alt="current image">
                        <small class="d-block text-muted">Current image — upload a new one to replace it.</small>
                    </div>
                @endif
                <input type="file" name="image" class="form-control" id="image" onchange="loadfile(event)">
                <img id="image_show" style="width:200px; height:100px; margin-top:8px; display:none;" alt="preview">
                <small class="text-muted">Max size: 8 MB. Allowed: jpeg, bmp, png.</small>
            </div>

            <div class="form-group">
                <label>Link</label>
                <input type="text" name="url" value="{{ $slide->url }}" class="form-control" id="url">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Slide</button>
            <a href="/admin/slides/list" class="btn btn-secondary ml-2">Cancel</a>
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

        document.getElementById('slideEditForm').addEventListener('submit', function(e) {
            var file = document.getElementById('image').files[0];
            if (file && file.size > 8 * 1024 * 1024) {
                e.preventDefault();
                alert('File too large. Maximum size: 8 MB.');
            }
        });
    </script>
@endsection
