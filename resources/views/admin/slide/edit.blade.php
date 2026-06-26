@extends('admin.main')

@section('content')

@section ('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

<div class="card card-primary">
    <!-- form start -->
    <form action =""  method="POST" enctype="multipart/form-data">

        <div class="card-body">
            <div class="form-group">
                <label>Slide Title</label>
                <input type="text" name="name" value="{{$slide->name}}" class="form-control" id="name">
            </div>

            <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="content" class="form-control">{{$slide->content}}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" onchange="loadfile(event)">
                <img src="{{ $slide->image}}" id="image_show"/ style="width: 150px; height: 100px" alt="image" >
            </div>     

            <div class="form-group">
                <label>Link</label>
                <input type="text" name="url" value="{{$slide->url}}" class="form-control" id="url">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Slides</button>
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

<script>
    var loadfile = function(event){
        var image_show = document.getElementById('image_show');
        image_show.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

