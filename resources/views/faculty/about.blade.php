<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('head')
</head>
<body>
@include('header')

<div class="container-fluid pt-5 mb-3">
    <div class="container">

        @if(!empty($info['introduction']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.introduction') }}</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['introduction'] !!}
        </div>
        @endif

        @if(!empty($info['vision']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.vision') }}</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['vision'] !!}
        </div>
        @endif

        @if(!empty($info['mission']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.mission') }}</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['mission'] !!}
        </div>
        @endif

        @if(!empty($info['history']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.history') }}</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['history'] !!}
        </div>
        @endif

        @if(!empty($info['org_structure']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.org_structure') }}</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;">
            {!! $info['org_structure'] !!}
        </div>
        @endif

        @if(!empty($info['office_info']))
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.contact_office') }}</h4>
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
