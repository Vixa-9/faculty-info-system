<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body>
@include('header')

<div class="container-fluid pt-5 mb-3">
    <div class="container">

        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Student Projects</h4>
        </div>

        {{-- Filters --}}
        <div class="bg-white border p-3 mb-4 d-flex flex-wrap" style="gap:12px; align-items:center;">
            <form method="GET" action="/student-projects" class="d-flex flex-wrap" style="gap:10px; align-items:center; width:100%;">
                <div style="flex:1; min-width:200px;">
                    <select name="department" class="form-control form-control-sm" onchange="this.form.submit()">
                        <option value="">All Departments</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept }}" {{ request('department') === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="min-width:120px;">
                    <select name="year" class="form-control form-control-sm" onchange="this.form.submit()">
                        <option value="">All Years</option>
                        @foreach($years as $y)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                </div>
                @if(request('department') || request('year'))
                    <a href="/student-projects" class="btn btn-sm btn-outline-secondary" style="color:#333;">
                        <i class="fas fa-times mr-1"></i>Clear
                    </a>
                @endif
            </form>
        </div>

        <div class="row">
        @forelse($projects as $project)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="bg-white border h-100 d-flex flex-column" style="color:#333;">

                    @if($project->image)
                        <img src="{{ $project->image }}"
                             style="width:100%;height:180px;object-fit:cover;"
                             alt="{{ $project->title }}">
                    @else
                        <div style="width:100%;height:140px;background:#e9ecef;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-project-diagram fa-3x text-muted"></i>
                        </div>
                    @endif

                    <div class="p-3 d-flex flex-column" style="flex:1;">

                        @if($project->award)
                            <div style="margin-bottom:6px;">
                                <span style="background:#e6a817;color:#1a1a1a;font-size:0.72rem;font-weight:700;padding:2px 8px;border-radius:3px;">
                                    <i class="fas fa-trophy mr-1"></i>{{ $project->award }}
                                </span>
                            </div>
                        @endif

                        <div style="font-weight:700;font-size:0.95rem;margin-bottom:8px;line-height:1.3;">
                            {{ $project->title }}
                        </div>

                        <div style="font-size:0.8rem;color:#888;margin-bottom:8px;">
                            @if($project->department)
                                <span class="mr-2"><i class="fas fa-building mr-1"></i>{{ $project->department }}</span>
                            @endif
                            @if($project->year)
                                <span><i class="far fa-calendar mr-1"></i>{{ $project->year }}</span>
                            @endif
                        </div>

                        @if($project->team_members)
                            <div style="font-size:0.82rem;color:#555;margin-bottom:6px;">
                                <i class="fas fa-users mr-1 text-muted"></i>{{ $project->team_members }}
                            </div>
                        @endif

                        @if($project->supervisor)
                            <div style="font-size:0.8rem;color:#555;margin-bottom:8px;">
                                <i class="fas fa-chalkboard-teacher mr-1 text-muted"></i>Supervisor: {{ $project->supervisor }}
                            </div>
                        @endif

                        @if($project->description)
                            <div style="font-size:0.85rem;color:#444;margin-top:auto;padding-top:8px;border-top:1px solid #f0f0f0;">
                                {{ Str::limit($project->description, 160) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="bg-white border p-4 text-center" style="color:#666;">
                    No projects found for the selected filters.
                </div>
            </div>
        @endforelse
        </div>

        <div class="mt-3">
            {!! $projects->appends(request()->query())->links("pagination::bootstrap-4") !!}
        </div>

    </div>
</div>

@include('footer')
</body>
</html>
