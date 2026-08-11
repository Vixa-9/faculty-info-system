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
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.research_activities') }}</h4>
        </div>

        {{-- Type filter tabs --}}
        <div class="mb-4">
            <a href="/research"
               class="btn btn-sm mr-1 mb-1 {{ !request('type') ? 'btn-primary' : 'btn-outline-secondary' }}"
               style="{{ !request('type') ? 'background:#1a4f8a;border-color:#1a4f8a;color:#fff;' : 'color:#333;' }}">
                {{ __('site.filter_all') }}
            </a>
            @foreach($types as $type)
            <a href="/research?type={{ urlencode($type) }}"
               class="btn btn-sm mr-1 mb-1 {{ request('type') === $type ? 'btn-primary' : 'btn-outline-secondary' }}"
               style="{{ request('type') === $type ? 'background:#1a4f8a;border-color:#1a4f8a;color:#fff;' : 'color:#333;' }}">
                {{ __('site.type_' . $type) }}
            </a>
            @endforeach
        </div>

        @forelse($activities as $activity)
        <div class="bg-white border mb-3 p-4 d-flex" style="color:#333; gap:20px; align-items:flex-start;">

            @if($activity->image)
                <img src="{{ $activity->image }}"
                     style="width:120px;height:90px;object-fit:cover;flex-shrink:0;border:1px solid #dee2e6;"
                     alt="{{ $activity->title }}">
            @else
                <div style="width:120px;height:90px;background:#e9ecef;flex-shrink:0;display:flex;align-items:center;justify-content:center;">
                    @php
                        $icon = [
                            'Research Project' => 'fa-flask',
                            'Publication'      => 'fa-book',
                            'Conference'       => 'fa-microphone',
                            'Workshop'         => 'fa-tools',
                            'Award'            => 'fa-trophy',
                        ][$activity->type] ?? 'fa-star';
                    @endphp
                    <i class="fas {{ $icon }} fa-2x text-muted"></i>
                </div>
            @endif

            <div style="flex:1;min-width:0;overflow-wrap:break-word;">
                @php
                    $badgeColor = [
                        'Research Project' => '#1a4f8a',
                        'Publication'      => '#28a745',
                        'Conference'       => '#17a2b8',
                        'Workshop'         => '#e6a817',
                        'Award'            => '#dc3545',
                    ][$activity->type] ?? '#6c757d';
                @endphp
                <span style="display:inline-block;background:{{ $badgeColor }};color:#fff;font-size:0.72rem;font-weight:600;padding:2px 8px;border-radius:3px;margin-bottom:6px;">
                    {{ $activity->type }}
                </span>

                <div style="font-weight:700;font-size:1rem;margin-bottom:4px;">{{ $activity->title }}</div>

                @if($activity->authors)
                    <div style="font-size:0.82rem;color:#555;margin-bottom:4px;">
                        <i class="fas fa-users mr-1 text-muted"></i>{{ $activity->authors }}
                    </div>
                @endif

                <div style="font-size:0.8rem;color:#888;margin-bottom:8px;">
                    @if($activity->department)
                        <span class="mr-3"><i class="fas fa-building mr-1"></i>{{ $activity->department }}</span>
                    @endif
                    @if($activity->date)
                        <span><i class="far fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($activity->date)->format('d/m/Y') }}</span>
                    @endif
                </div>

                @if($activity->description)
                    <div style="font-size:0.88rem;color:#444;">
                        {{ Str::limit($activity->description, 220) }}
                    </div>
                @endif

                @if($activity->link)
                    <div style="margin-top:8px;">
                        <a href="{{ $activity->link }}" target="_blank" rel="noopener"
                           style="color:#1a4f8a;font-size:0.82rem;font-weight:600;">
                            <i class="fas fa-external-link-alt mr-1"></i>{{ __('site.view_more') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
        @empty
            <div class="bg-white border p-4 text-center" style="color:#666;">
                {{ __('site.no_research') }}
            </div>
        @endforelse

        <div class="mt-3">
            {!! $activities->appends(request()->query())->links("pagination::bootstrap-4") !!}
        </div>

    </div>
</div>

@include('footer')
</body>
</html>
