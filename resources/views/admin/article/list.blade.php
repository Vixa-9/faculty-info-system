@extends('admin.main')

@section('content')
    <div class="row align-items-center py-3 px-lg-12" style="margin: 1px;" style="margin: 2px;">
        <div class="col-md-8 offset-md-2">
            <form action="search" method="get">
                <div class="input-group">
                    <input type="search" name="keyword" id = "keyword" class="form-control form-control-small" placeholder="Tìm kiếm">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-small btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <a class="btn btn-success" href="{{'add'}}">Add New Post
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:50px">Numerical order</th>
            {{-- <th style="width:50px">ID</th>--}}
            <th style="width:300px">Title</th>
            <th style="width:300px">Category</th>
            <th style="width:200px">Header image</th>
            <th style="width:150px">Posted by</th>
            <th style="width:50px">Hot</th>
            <th style="width:100px">Updated</th>
            <th style="width:50px">Edit</th>
            <th style="width:50px">Delete</th>
            {{--  <th style="width:100px">&nbsp;</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($arts as $key => $art)
            <tr>
                <td>{{$key+1}}</td>
                {{--<td>{{$new->id}}</td>--}}
                <td>{{$art->name}}</td>
                <td>{{$art->menu->name}}</td>
                <td>
                    @if($art->image)
                        <a href="{{ $art->image }}" target="_blank">
                            <img src="{{ $art->image }}" width="100px" style="object-fit:cover;height:60px;"
                                 onerror="this.parentElement.outerHTML='<span class=\'text-muted small\'>No image</span>';">
                        </a>
                    @else
                        <span class="text-muted small">No image</span>
                    @endif
                </td>
                <input type="hidden" name="image" value="{{ $art->image}}" id="image">

                <td>{!! \App\Helpers\Helper::user($art->user)!!}</td>
                <td>{!! \App\Helpers\Helper::active($art->hot)!!}</td>
                <td>{{ $art->updated_at }}</td>
                <td>
                    <a class = "btn btn-primary btn-sm" href="/admin/arts/edit/{{$art->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $art->id }}, '/admin/arts/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $arts->links("pagination::bootstrap-4") !!}
    </div>
@endsection
<style>
    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -7.5px;
        margin-left: -7.5px;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
</style>
