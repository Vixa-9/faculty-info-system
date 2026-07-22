@extends('admin.main')

@section('content')
    <form action="/admin/student-projects/{{ $project->id }}" method="POST" enctype="multipart/form-data" id="projectForm">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}"
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
                                <option value="{{ $dept }}"
                                    {{ old('department', $project->department) === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Year</label>
                        <input type="number" name="year" value="{{ old('year', $project->year) }}" class="form-control"
                               min="2000" max="{{ date('Y') + 1 }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Supervisor</label>
                        <input type="text" name="supervisor" value="{{ old('supervisor', $project->supervisor) }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Team Members</label>
                <input type="text" name="team_members" value="{{ old('team_members', $project->team_members) }}" class="form-control">
                <small class="text-muted">Separate names with commas.</small>
            </div>

            <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" value="{{ old('award', $project->award) }}" class="form-control">
                <small class="text-muted">Leave blank if no award.</small>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                @if($project->image)
                    <div class="mb-2">
                        <img src="{{ $project->image }}" style="max-width:240px;" alt="current image">
                        <div><small class="text-muted">Current image. Upload a new one to replace it.</small></div>
                    </div>
                @endif
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                       onchange="loadfile(event)">
                <img id="image_show" style="max-width:240px;margin-top:8px;display:none;" alt="preview">
                <small class="text-muted">Max 2 MB. Allowed: jpeg, bmp, png.</small>
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
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
