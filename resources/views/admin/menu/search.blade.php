@extends('admin.main')

@section('content')
    <div class="row align-items-center py-3 px-lg-12" style="margin: 1px;" style="margin: 2px;">
        
        <a class="btn btn-success" href="{{'list'}}">Danh sách Menu
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:50px">STT</th>
            <th>Name</th>
            <th style="width:50px">Active</th>
            <th style="width:200px">Update</th>
           
        </tr>
        </thead>
        @foreach($mResult as $p)
        <tbody>
            <td>{{$p->stt}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->active}}</td>
            <td>{{$p->updated_at}}</td>    
        </tbody>
         @endforeach
    </table>
    <div class="card-footer clearfix">
      {{ $mResult->appends(Request::all())->links("pagination::bootstrap-4") }}
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
