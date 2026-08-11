@extends('admin.main')

@section('content')
    <div class="card-body p-0">
        <div class="p-3 d-flex justify-content-end">
            <a href="/admin/student-projects/create" class="btn btn-success btn-sm">
                <i class="fas fa-plus mr-1"></i>Add Project
            </a>
        </div>
        <table class="table table-striped table-bordered table-hover mb-0">
            <thead>
                <tr>
                    <th style="width:40px">#</th>
                    <th>Title</th>
                    <th style="width:160px">Department</th>
                    <th style="width:60px">Year</th>
                    <th>Award</th>
                    <th style="width:50px">Edit</th>
                    <th style="width:50px">Del</th>
                </tr>
            </thead>
            <tbody>
            @foreach($projects as $key => $project)
                <tr>
                    <td>{{ ($projects->currentPage() - 1) * $projects->perPage() + $key + 1 }}</td>
                    <td>
                        <div style="font-weight:600;">{{ $project->title }}</div>
                        @if($project->team_members)
                            <small class="text-muted">{{ Str::limit($project->team_members, 60) }}</small>
                        @endif
                    </td>
                    <td>{{ $project->department ?? '—' }}</td>
                    <td>{{ $project->year ?? '—' }}</td>
                    <td>
                        @if($project->award)
                            <span class="badge badge-warning text-dark">
                                <i class="fas fa-trophy mr-1"></i>{{ Str::limit($project->award, 40) }}
                            </span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>
                        <a href="/admin/student-projects/{{ $project->id }}/edit" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                           onclick="removeRow({{ $project->id }}, '/admin/student-projects/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="p-3">
            {!! $projects->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@endsection
