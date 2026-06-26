@extends('admin.main')

@section('content')
    <div class="row align-items-center py-3 px-lg-12" style="margin: 1px;" style="margin: 2px;">
        <div class="col-md-8 offset-md-2">
            <form action="search" method="get">
                <div class="input-group">
                    <input type="search" name = "keyword" id="keyword" class="form-control form-control-small" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-small btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                </div>
            </form>
        </div>
        <a class="btn btn-success" href="{{'add'}}">Add a new menu.
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
    
    <div class="card-footer clearfix">
        {!! $menus->links("pagination::bootstrap-4") !!}
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
