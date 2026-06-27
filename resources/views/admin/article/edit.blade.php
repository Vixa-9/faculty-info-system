@extends('admin.main')

@section ('head')
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action ="" method="POST" enctype="multipart/form-data">

            <div class="card-body">
                <div class="form-group">
                    <label>Article title</label>
                    <input type="text" name="name" value="{{ $art->name }}" class="form-control" id="name" placeholder="Nhập tiêu đề bài viết">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class ="form-control" name="menu_id">
                        <option value="0"> Father's section </option>
                        @foreach($menus as $menu)
                            <option value = "{{$menu->id}}" {{ $art->menu_id == $menu->id ? 'selected' : '' }}
                            >{{$menu->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Summary</label>
                    <textarea name="description" class="form-control">{{ $art->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="content" class="form-control ckeditor">{{$art->content}}</textarea>
                </div>


                <div class="form-group">
                    <label for="image">Article Image</label>
                    <input type="file" name="image" class="form-control" id="image" onchange="loadfile(event)">
                    <img src="{{ $art->image}}" id="image_show"/ style="width: 150px; height: 100px" alt="image" >
                </div>

                <div class="form-group">
                    <label>Posted by</label>
                    <select class ="form-control" name="user" >
                        <option value="0" {{ $art->user == 0 ? ' checked=""' : '' }}> Admin </option>
                        <option value="1" {{ $art->user == 1 ? ' checked=""' : '' }}> User </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Featured News</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="hot" name="hot"
                            {{ $art->hot== 1 ? ' checked=""' : '' }}>
                        <label for="hot" class="custom-control-label">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_hot" name="hot"
                            {{ $art->hot== 0 ? ' checked=""' : '' }}>
                        <label for="no_hot" class="custom-control-label">No</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Article</button>
            </div>
            @csrf
        </form>
    </div>
@endsection

@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content',{
            enterMode : CKEDITOR.ENTER_BR,
            shiftEnterMode : CKEDITOR.ENTER_P
        });

    </script>
@endsection

@section('footer')
    <script>
        function loadfile(event) {
            document.getElementById('image_show').src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
