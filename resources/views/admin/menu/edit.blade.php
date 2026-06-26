@extends('admin.main')

@section ('head')
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action ="" method="POST">

            <div class="card-body">
                <div class="form-group">
                    <label>Menu Name</label>
                    <input type="text" name="name" value="{{$menu->name}}" class="form-control" id="menu" placeholder="Nhập tên menu">
                </div>

                <div class="form-group">
                    <label>Menu</label>
                    <select class ="form-control" name="parent_id">
                        <option value="0"{{$menu->parent_id == 0 ? 'selected' :''}}> Menu cha </option>
                        @foreach($menus as $menuParent)
                            <option value="{{$menuParent->id}}"
                                {{$menu->parent_id == $menuParent->id ? 'selected' :''}}>
                                {{$menuParent->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

               <div class="form-group">
                    <label>Link</label>
                   <input type="text" name="link" value="{{$menu->link}}" class="form-control" id="link" placeholder="Nhập link menu">
                </div>

                <div class=" "form-group>
                    <label>Activate</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" name="active" value = "1"
                        {{$menu->active == 1 ? 'checked="" ':''}}>
                        <label for="active" class="custom-control-label">Yes</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="no_active" name="active" value="0"
                            {{$menu->active == 0 ? 'checked="" ':''}}>
                        <label for="no_active" class="custom-control-label">No</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Menu Update</button>
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
