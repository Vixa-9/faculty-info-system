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
            <h4 class="m-0 text-uppercase font-weight-bold">{{ $department->name }}</h4>
        </div>

        @if($department->introduction)
        <div class="bg-white border p-4 mb-4" style="color:#333;overflow-x:auto;">
            {!! $department->introduction !!}
        </div>
        @endif

        @if($department->training_programs)
        <div class="section-title mt-3">
            <h4 class="m-0 text-uppercase font-weight-bold" style="font-size:1rem;">{{ __('site.training_programs') }}</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;overflow-x:auto;">
            {!! $department->training_programs !!}
        </div>
        @endif

        @if($department->research_activities)
        <div class="section-title mt-3">
            <h4 class="m-0 text-uppercase font-weight-bold" style="font-size:1rem;">{{ __('site.dept_research') }}</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;overflow-x:auto;">
            {!! $department->research_activities !!}
        </div>
        @endif

        @if($lecturers->isNotEmpty())
        <div class="section-title mt-3">
            <h4 class="m-0 text-uppercase font-weight-bold" style="font-size:1rem;">{{ __('site.lecturers') }}</h4>
        </div>
        <div class="row mb-4">
            @foreach($lecturers as $lecturer)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="bg-white border p-3 d-flex" style="color:#333; gap:16px; align-items:flex-start;">
                    @if($lecturer->photo)
                        <img src="{{ $lecturer->photo }}" style="width:70px;height:70px;object-fit:cover;border-radius:50%;flex-shrink:0;" alt="{{ $lecturer->name }}">
                    @else
                        <div style="width:70px;height:70px;background:#e9ecef;border-radius:50%;flex-shrink:0;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-user fa-2x text-muted"></i>
                        </div>
                    @endif
                    <div>
                        <div style="font-weight:700;font-size:0.95rem;">
                            {{ $lecturer->title ? $lecturer->title . ' ' : '' }}{{ $lecturer->name }}
                        </div>
                        @if($lecturer->position)
                            <div style="color:#1a4f8a;font-size:0.82rem;">{{ $lecturer->position }}</div>
                        @endif
                        @if($lecturer->email)
                            <div style="font-size:0.8rem;margin-top:4px;">
                                <i class="fas fa-envelope mr-1 text-muted"></i>{{ $lecturer->email }}
                            </div>
                        @endif
                        @if($lecturer->research_interests)
                            <div style="font-size:0.78rem;color:#666;margin-top:4px;">
                                <i class="fas fa-flask mr-1"></i>{{ $lecturer->research_interests }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if($department->contact_info)
        <div class="section-title mt-3">
            <h4 class="m-0 text-uppercase font-weight-bold" style="font-size:1rem;">{{ __('site.contact') }}</h4>
        </div>
        <div class="bg-white border p-4 mb-4" style="color:#333;overflow-x:auto;">
            {!! nl2br(e($department->contact_info)) !!}
        </div>
        @endif

        <div class="mb-4">
            <a href="/departments" style="color:#1a4f8a;">&larr; {{ __('site.back_to_departments') }}</a>
        </div>

    </div>
</div>

@include('footer')
</body>
</html>
