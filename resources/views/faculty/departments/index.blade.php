<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('head')
</head>
<body>
@include('header')

<div class="container-fluid pt-5 mb-3">
    <div class="container">

        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.departments') }}</h4>
        </div>

        <div class="row mb-4">
            @foreach($departments as $department)
            <div class="col-md-6 mb-3">
                <a href="/departments/{{ $department->slug }}" class="text-decoration-none">
                    <div class="bg-white border p-4 h-100" style="color:#333; transition: box-shadow .2s;"
                         onmouseover="this.style.boxShadow='0 2px 12px rgba(26,79,138,.15)'"
                         onmouseout="this.style.boxShadow=''">
                        <h5 style="color:#1a4f8a; font-weight:700; margin-bottom:8px;">{{ $department->name }}</h5>
                        @if($department->introduction)
                            <div style="font-size:0.88rem; color:#555;">
                                {!! Str::limit(strip_tags($department->introduction), 180) !!}
                            </div>
                        @endif
                        <div style="margin-top:12px; font-size:0.82rem; color:#1a4f8a; font-weight:600;">
                            {{ trans('site.lecturer_count', ['count' => $department->lecturers()->count()]) }}
                            &rarr; {{ __('site.view_details') }}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>

@include('footer')
</body>
</html>
