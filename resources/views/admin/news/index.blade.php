@extends('admin.main')

@section('content')
    <div class="row align-items-center py-3 px-lg-12" style="margin: 1px;">
        <div class="col-md-8 offset-md-2">
            <form action="search" method="get">
                <div class="input-group">
                    <input type="search" name="keyword" class="form-control form-control-small" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-small btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <a class="btn btn-success" href="/admin/news/create">Add News</a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:50px">#</th>
            <th>Title</th>
            <th style="width:120px">Image</th>
            <th style="width:80px">Active</th>
            <th style="width:130px">Published</th>
            <th style="width:50px">Edit</th>
            <th style="width:50px">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $key => $item)
            <tr>
                <td>{{ ($news->currentPage() - 1) * $news->perPage() + $key + 1 }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    @if($item->image)
                        <img src="{{ $item->image }}" width="80px">
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </td>
                <td>
                    @if($item->active)
                        <span class="badge badge-success">Yes</span>
                    @else
                        <span class="badge badge-secondary">No</span>
                    @endif
                </td>
                <td>{{ $item->published_at ? $item->published_at->format('d/m/Y') : '—' }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/news/{{ $item->id }}/edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $item->id }}, '/admin/news/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $news->links("pagination::bootstrap-4") !!}
    </div>
@endsection
<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -7.5px;
        margin-left: -7.5px;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
</style>
