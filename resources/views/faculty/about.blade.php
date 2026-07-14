<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body>
@include('header')

<div class="container-fluid pt-5 mb-3">
    <div class="container">

        @if(!empty($info['introduction']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Introduction</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['introduction'] !!}
        </div>
        @endif

        @if(!empty($info['vision']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Vision</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['vision'] !!}
        </div>
        @endif

        @if(!empty($info['mission']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Mission</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['mission'] !!}
        </div>
        @endif

        @if(!empty($info['history']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">History</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['history'] !!}
        </div>
        @endif

        @if(!empty($info['org_structure']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Organizational Structure</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['org_structure'] !!}
        </div>
        @endif

        @if(!empty($info['office_info']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Contact & Office</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['office_info'] !!}
        </div>
        @endif

    </div>
</div>

@include('footer')
</body>
</html>
