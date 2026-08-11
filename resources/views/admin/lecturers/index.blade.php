@extends('admin.main')

@section('content')
    <div class="card-body p-0">
        <div class="p-3 d-flex justify-content-end">
            <a href="/admin/lecturers/create" class="btn btn-success btn-sm">
                <i class="fas fa-plus mr-1"></i>Add Lecturer
            </a>
        </div>
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover mb-0">
            <thead>
                <tr>
                    <th style="width:50px">#</th>
                    <th style="width:70px">Photo</th>
                    <th>Name</th>
                    <th style="width:80px">Title</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th style="width:50px">Edit</th>
                    <th style="width:50px">Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lecturers as $key => $lecturer)
                <tr>
                    <td>{{ ($lecturers->currentPage() - 1) * $lecturers->perPage() + $key + 1 }}</td>
                    <td>
                        @if($lecturer->photo)
                            <img src="{{ $lecturer->photo }}" width="50" height="50" style="object-fit:cover;border-radius:50%;">
                        @else
                            <div style="width:50px;height:50px;background:#e9ecef;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <i class="fas fa-user text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $lecturer->name }}</td>
                    <td>{{ $lecturer->title ?? '—' }}</td>
                    <td>{{ $lecturer->department }}</td>
                    <td>{{ $lecturer->position ?? '—' }}</td>
                    <td>
                        <a href="/admin/lecturers/{{ $lecturer->id }}/edit" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                           onclick="removeRow({{ $lecturer->id }}, '/admin/lecturers/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <div class="p-3">
            {!! $lecturers->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@endsection
