@extends('admin.main')

@section('content')
    <div class="row align-items-center py-3 px-lg-12" style="margin: 1px;" style="margin: 2px;">

        <a class="btn btn-success" href="{{'list'}}">List of Articles
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:50px">Numerical order</th>
            <th style="width:50px">Title</th>
            <th style="width:200px">Category</th>
            <th>Ảnh tiêu đề</th>
            <th style="width:200px">Posted by</th>
            <th style="width:50px">Hot</th>
            <th style="width:50px">Updated</th>

        </tr>
        </thead>
        @foreach($aResult as $key => $art)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$art->name}}</td>
                <td>{{$art->menu->name}}</td>
                <td>
                    <div id="image_show">
                        <a href="{{ $art->image}}" target="_blank">
                            <img src="{{ $art->image}}" width="100px">
                        </a>
                    </div>
                </td>
                <input type="hidden" name="photo" value="{{ $art->image}}" id="photo">


                <td>{!! \App\Helpers\Helper::user($art->user)!!}</td>
                <td>{!! \App\Helpers\Helper::active($art->hot)!!}</td>
                <td>{{ $art->updated_at }}</td>
        @endforeach
    </table>
    <div class="card-footer clearfix">
        {{ $aResult->appends(Request::all())->links("pagination::bootstrap-4") }}
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
