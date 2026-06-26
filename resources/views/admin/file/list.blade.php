@extends('admin.main')

@section('content')
    <div class="row align-items-center py-3 px-lg-12" style="margin: 1px;" style="margin: 2px;">
        <div class="input-group input-group-sm" style="width: 250px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" style="height: 40px;">
            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <a class="btn btn-success" href="{{'outline'}}">Thêm File Upload
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:50px">STT</th>
            <th style="width:50px">ID</th>
            <th>Tên Ngành</th>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th style="width:50px">Học Kỳ</th>
            <th style="width:150px">Năm Học</th>
            <th style="width:50px">Edit</th>
            <th style="width:50px">Delete</th>
            {{--<th style="width: 100px">&nbsp;</th>--}}
        </tr>
        </thead>
        <tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div id="image_show">
                        <a href="" target="_blank">
                            <img src="" width="150px">
                        </a>
                    </div>
                </td>
                <input type="hidden" name="photo" value="" id="photo">
                <td></td>
                <td></td>
                <td></td>

                <td>
                    <a class = "btn btn-primary btn-sm" href="/admin/files/edit/">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{}}, '/admin/files/destroy-outline')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>

        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{--{!! $sliders->links("pagination::bootstrap-4") !!}--}}
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

