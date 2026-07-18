@extends('admin.main')

@section('content')
    <form action="/admin/lecturers/{{ $lecturer->id }}" method="POST" enctype="multipart/form-data" id="lecturerForm">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $lecturer->name) }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title', $lecturer->title) }}" class="form-control" placeholder="Dr., MSc., Eng.">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" name="position" value="{{ old('position', $lecturer->position) }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Department <span class="text-danger">*</span></label>
                <select name="department" class="form-control @error('department') is-invalid @enderror">
                    <option value="">— Select department —</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept }}" {{ old('department', $lecturer->department) === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                    @endforeach
                </select>
                @error('department')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email', $lecturer->email) }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $lecturer->phone) }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Photo</label>
                @if($lecturer->photo)
                    <div class="mb-2">
                        <img src="{{ $lecturer->photo }}" style="width:80px;height:80px;object-fit:cover;border-radius:50%;" alt="current photo">
                        <small class="d-block text-muted">Current photo — upload a new one to replace it.</small>
                    </div>
                @endif
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo" onchange="loadfile(event)">
                <img id="photo_show" style="width:100px;height:100px;margin-top:8px;object-fit:cover;border-radius:50%;display:none;" alt="preview">
                <small class="text-muted">Max 2 MB. Allowed: jpeg, bmp, png.</small>
                @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Bio</label>
                <textarea name="bio" class="form-control" rows="4">{{ old('bio', $lecturer->bio) }}</textarea>
            </div>

            <div class="form-group">
                <label>Research Interests</label>
                <textarea name="research_interests" class="form-control" rows="3">{{ old('research_interests', $lecturer->research_interests) }}</textarea>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Lecturer</button>
            <a href="/admin/lecturers" class="btn btn-secondary ml-2">Cancel</a>
        </div>
    </form>
@endsection

@section('footer')
<script>
    function loadfile(event) {
        var img = document.getElementById('photo_show');
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = 'block';
    }
    document.getElementById('lecturerForm').addEventListener('submit', function(e) {
        var file = document.getElementById('photo').files[0];
        if (file && file.size > 2 * 1024 * 1024) {
            e.preventDefault();
            alert('File too large. Maximum size: 2 MB.');
        }
    });
</script>
@endsection
