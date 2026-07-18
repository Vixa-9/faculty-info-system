@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="/admin/departments/{{ $department->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label class="font-weight-bold">Department Name</label>
                <input type="text" class="form-control" value="{{ $department->name }}" disabled>
                <small class="text-muted">Department names are fixed and cannot be changed.</small>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Introduction</label>
                <textarea name="introduction" id="field_introduction" class="form-control" rows="5">{{ old('introduction', $department->introduction) }}</textarea>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Training Programs</label>
                <textarea name="training_programs" id="field_training_programs" class="form-control" rows="5">{{ old('training_programs', $department->training_programs) }}</textarea>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Research Activities</label>
                <textarea name="research_activities" id="field_research_activities" class="form-control" rows="5">{{ old('research_activities', $department->research_activities) }}</textarea>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Contact Info</label>
                <textarea name="contact_info" id="field_contact_info" class="form-control" rows="4" placeholder="Office room, phone, email...">{{ old('contact_info', $department->contact_info) }}</textarea>
                <small class="text-muted">Plain text. Use new lines to separate entries.</small>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="/admin/departments" class="btn btn-secondary ml-2">Cancel</a>
        </div>
    </form>
@endsection

@section('footer')
<script>
    const richFields = ['field_introduction', 'field_training_programs', 'field_research_activities'];
    richFields.forEach(function(id) {
        if (document.getElementById(id)) {
            CKEDITOR.replace(id, {
                enterMode: CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P,
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', '-', 'RemoveFormat'] },
                    { name: 'paragraph',   items: ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter'] },
                    { name: 'links',       items: ['Link', 'Unlink'] },
                ]
            });
        }
    });
</script>
@endsection
