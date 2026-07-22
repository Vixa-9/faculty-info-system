@extends('admin.main')

@section('content')
    <div class="card-body p-0">
        <div class="p-3 d-flex justify-content-end">
            <a href="/admin/research/create" class="btn btn-success btn-sm">
                <i class="fas fa-plus mr-1"></i>Add Activity
            </a>
        </div>
        <table class="table table-striped table-bordered table-hover mb-0">
            <thead>
                <tr>
                    <th style="width:40px">#</th>
                    <th>Title</th>
                    <th style="width:130px">Type</th>
                    <th style="width:120px">Department</th>
                    <th style="width:95px">Date</th>
                    <th style="width:50px">Edit</th>
                    <th style="width:50px">Del</th>
                </tr>
            </thead>
            <tbody>
            @foreach($activities as $key => $activity)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $activity->title }}</td>
                    <td>
                        @php
                            $badge = [
                                'Research Project' => 'primary',
                                'Publication'      => 'success',
                                'Conference'       => 'info',
                                'Workshop'         => 'warning',
                                'Award'            => 'danger',
                            ][$activity->type] ?? 'secondary';
                        @endphp
                        <span class="badge badge-{{ $badge }}">{{ $activity->type }}</span>
                    </td>
                    <td>{{ $activity->department ?? '—' }}</td>
                    <td>{{ $activity->date ? \Carbon\Carbon::parse($activity->date)->format('d/m/Y') : '—' }}</td>
                    <td>
                        <a href="/admin/research/{{ $activity->id }}/edit" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                           onclick="removeRow({{ $activity->id }}, '/admin/research/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="p-3">
            {!! $activities->links("pagination::bootstrap-4") !!}
        </div>
    </div>
@endsection
