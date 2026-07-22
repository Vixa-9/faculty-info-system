@extends('admin.main')

@section('content')
    <form action="/admin/research" method="POST" enctype="multipart/form-data" id="researchForm">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type <span class="text-danger">*</span></label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror">
                            <option value="">— Select type —</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ old('type') === $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Department</label>
                        <select name="department" class="form-control">
                            <option value="">— All / None —</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept }}" {{ old('department') === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Authors</label>
                <input type="text" name="authors" value="{{ old('authors') }}" class="form-control"
                       placeholder="e.g. Nguyễn Văn An, Lê Hoàng Minh">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" value="{{ old('date') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Link (URL)</label>
                        <input type="url" name="link" value="{{ old('link') }}" class="form-control"
                               placeholder="https://...">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                       onchange="loadfile(event)">
                <img id="image_show" style="max-width:200px;margin-top:8px;display:none;" alt="preview">
                <small class="text-muted">Max 2 MB. Allowed: jpeg, bmp, png.</small>
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Activity</button>
            <a href="/admin/research" class="btn btn-secondary ml-2">Cancel</a>
        </div>
    </form>
@endsection

@section('footer')
<script>
    function loadfile(event) {
        var img = document.getElementById('image_show');
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = 'block';
    }
    document.getElementById('researchForm').addEventListener('submit', function(e) {
        var file = document.getElementById('image').files[0];
        if (file && file.size > 2 * 1024 * 1024) {
            e.preventDefault();
            alert('File too large. Maximum size: 2 MB.');
        }
    });
</script>
@endsection
