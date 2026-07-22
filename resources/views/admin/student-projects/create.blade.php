@extends('admin.main')

@section('content')
    <form action="/admin/student-projects" method="POST" enctype="multipart/form-data" id="projectForm">
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
                        <label>Department</label>
                        <select name="department" class="form-control">
                            <option value="">— Select department —</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept }}" {{ old('department') === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Year</label>
                        <input type="number" name="year" value="{{ old('year') }}" class="form-control"
                               min="2000" max="{{ date('Y') + 1 }}" placeholder="{{ date('Y') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Supervisor</label>
                        <input type="text" name="supervisor" value="{{ old('supervisor') }}" class="form-control"
                               placeholder="Dr. Nguyễn Văn An">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Team Members</label>
                <input type="text" name="team_members" value="{{ old('team_members') }}" class="form-control"
                       placeholder="Nguyễn Văn A, Trần Thị B, Lê Văn C">
                <small class="text-muted">Separate names with commas.</small>
            </div>

            <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" value="{{ old('award') }}" class="form-control"
                       placeholder="e.g. First Prize — Faculty Science Fair 2024">
                <small class="text-muted">Leave blank if no award.</small>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                       onchange="loadfile(event)">
                <img id="image_show" style="max-width:240px;margin-top:8px;display:none;" alt="preview">
                <small class="text-muted">Max 2 MB. Allowed: jpeg, bmp, png.</small>
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Project</button>
            <a href="/admin/student-projects" class="btn btn-secondary ml-2">Cancel</a>
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
    document.getElementById('projectForm').addEventListener('submit', function(e) {
        var file = document.getElementById('image').files[0];
        if (file && file.size > 2 * 1024 * 1024) {
            e.preventDefault();
            alert('File too large. Maximum size: 2 MB.');
        }
    });
</script>
@endsection
