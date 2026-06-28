@extends('admin.main')

@section('content')
    <div class="row align-items-center py-3 px-lg-12" style="margin: 1px;" style="margin: 2px;">
        <div class="col-md-8 offset-md-2">
            <form action="search" method="get">
                <div class="input-group">
                    <input type="search" name="keyword" id ="keyword" class="form-control form-control-small" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-small btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                </div>
            </form>
        </div>
        <a class="btn btn-success" href="/admin/slides/add">Add New Slide
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:50px">Numberical order</th>
            <th style="width:50px">ID</th>
            <th style="width: 300px">Title</th>
            <th style="width:300px">Content</th>
            <th>Ảnh</th>
            <th style="width:150px">Link</th>
            <th style="width:50px">Edit</th>
            <th style="width:50px">Delete</th>
            {{--<th style="width: 100px">&nbsp;</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($slides as $key => $slide)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$slide->id}}</td>
                <td>{{$slide->name}}</td>
                <td>{{$slide->content}}</td>
                <td>
                    <div id="image_show"/>
                        <a href="{{ $slide->image}}" target="_blank">
                            <img src="{{ $slide->image}}" width="150px">
                        </a>
                    </div>
                </td>
                <input type="hidden" name="image" value="{{ $slide->image}}" id="image_show"/>

                <td>{{$slide->url}}</td>
                <td>
                    <a class = "btn btn-primary btn-sm" href="/admin/slides/edit/{{$slide->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $slide->id }}, '/admin/slides/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $slides->links("pagination::bootstrap-4") !!}
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

