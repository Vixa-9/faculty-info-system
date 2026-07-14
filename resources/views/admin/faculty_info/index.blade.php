@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="/admin/faculty-info" method="POST">
        @csrf
        <div class="card-body">
            @foreach($fields as $key => $label)
            <div class="form-group">
                <label class="font-weight-bold">{{ $label }}</label>
                <textarea
                    name="fields[{{ $key }}]"
                    id="field_{{ $key }}"
                    class="form-control"
                    rows="4"
                >{{ old('fields.' . $key, $data[$key] ?? '') }}</textarea>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
@endsection

@section('footer')
<script>
    const richFields = ['field_introduction', 'field_vision', 'field_mission', 'field_history', 'field_org_structure'];
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
