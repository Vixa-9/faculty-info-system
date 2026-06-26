@extends('admin.main')

@section ('head')
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
@endsection

@section('content')
    <div class="col-lg-12 text-center text-lg-right" style="margin: 4px;">
        <a class="btn btn-success" href="{{'list'}}">Menu list
        </a>
    </div>

    <div class="card card-primary">
        <!-- form start -->
        <form action ="" method="POST">

            <div class="card-body">
                <div class="form-group">
                    <label>Menu Name</label>
                    <input type="text" name="name" class="form-control" id="menu" placeholder="Nhập tên menu">
                </div>

                <div class="form-group">
                    <label>Menu</label>
                    <select class ="form-control" name="parent_id">
                        <option value="0"> Parent menu </option>
                            @foreach($menus as $menu)
                            <option value="{{$menu->id}}"> {{$menu->name}} </option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control" id="link" placeholder="Nhập link menu">
                </div>

                <div class=" "form-group>
                    <label>Activate</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" name="active" value="1" checked="">
                        <label for="active" class="custom-control-label">Yes</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="no_active" name="active">
                        <label for="no_active" class="custom-control-label">No</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Menu Book</button>
            </div>
            @csrf
        </form>
    </div>
@endsection

@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
@endsection
