@extends('admin.main')

@section('content')
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Lecturers</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td><strong>{{ $department->name }}</strong></td>
                    <td><code>{{ $department->slug }}</code></td>
                    <td>{{ $department->lecturers()->count() }}</td>
                    <td>
                        <a href="/admin/departments/{{ $department->id }}/edit" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="/departments/{{ $department->slug }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
