@extends('admin.main')

@section('content')

{{-- Summary cards --}}
<div class="row">
    <div class="col-md-4">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-eye"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Today</span>
                <span class="info-box-number">{{ number_format($today) }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-calendar-week"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">This week</span>
                <span class="info-box-number">{{ number_format($thisWeek) }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-chart-line"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">This month</span>
                <span class="info-box-number">{{ number_format($thisMonth) }}</span>
            </div>
        </div>
    </div>
</div>

{{-- Line chart + Pie chart --}}
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-area mr-1"></i>Visits — last 30 days</h3>
            </div>
            <div class="card-body">
                <canvas id="lineChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>By section (30 days)</h3>
            </div>
            <div class="card-body d-flex justify-content-center">
                <canvas id="pieChart" style="max-height:260px;"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Top 10 pages --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list mr-1"></i>Top 10 pages (last 30 days)</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>URL</th>
                            <th class="text-right">Visits</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topPages as $i => $page)
                        <tr>
                            <td class="text-muted" style="width:40px;">{{ $i + 1 }}</td>
                            <td><code>{{ $page->page_url }}</code></td>
                            <td class="text-right font-weight-bold">{{ number_format($page->visits) }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center text-muted py-3">No data yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
// Line chart — 30 days
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: @json($last30->keys()),
        datasets: [{
            label: 'Visits',
            data: @json($last30->values()),
            backgroundColor: 'rgba(60,141,188,0.15)',
            borderColor: 'rgba(60,141,188,1)',
            borderWidth: 2,
            pointRadius: 3,
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
        plugins: { legend: { display: false } }
    }
});

// Pie chart — sections
new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: @json($sections->keys()),
        datasets: [{
            data: @json($sections->values()),
            backgroundColor: [
                '#4e73df', // Home
                '#1cc88a', // News
                '#f6c23e', // Research
                '#e74a3b', // Departments
                '#6f42c1', // Lecturers
                '#36b9cc', // Student Projects
                '#858796', // About
                '#fd7e14'  // Other
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } }
        }
    }
});
</script>
@endsection
