@extends('admin.main')

@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action ="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department/Division/Office Name</label> <span>(*)</span>
                            <input type="text" name="company" value=" {{$company->description}}" class="form-control" id="company">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="menu">Logo</label><span>(*)</span>
                    <input type="file" name="logo" class="form-control" id="logo">
                    <div id="image_show">
                        <a href="{{$logo->description}}" target="_blank">
                            <img src="{{url('images/logo/'.$logo->description)}}" width="100px">
                        </a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="menu">Favicon</label><span>(*)</span>
                    <input type="file" name="favicon" class="form-control" id="favicon">
                    <div id="image_show">
                        <a href="{{$favicon->description}}" target="_blank">
                            <img src="{{url('images/favicon/'.$favicon->description)}}" width="100px">
                        </a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="menu">Email</label><span>(*)</span>
                    <input type="text" name="email" value=" {{$email->description}}"  class="form-control" >
                </div>

                <div class="form-group">
                    <label for="menu">Phone</label><span>(*)</span>
                    <input type="text" name="phone" value=" {{$phone->description}}" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="menu">Address</label><span>(*)</span>
                    <input type="text" name="address1" value=" {{$address1->description}}" class="form-control" >
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Configuration</button>
            </div>
            @csrf
        </form>
    </div>
@endsection


