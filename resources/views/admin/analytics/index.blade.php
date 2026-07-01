@extends('admin.main')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-eye"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Visits today</span>
                <span class="info-box-number">{{ number_format($today) }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-chart-line"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Last 30 days</span>
                <span class="info-box-number">{{ number_format($totalLast30) }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Visits last 14 days</h3>
            </div>
            <div class="card-body">
                <canvas id="visitChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top 10 pages (last 30 days)</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm table-striped mb-0">
                    <thead>
                        <tr>
                            <th>URL</th>
                            <th class="text-right">Visits</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topPages as $page)
                        <tr>
                            <td><code>{{ $page->page_url }}</code></td>
                            <td class="text-right">{{ number_format($page->visits) }}</td>
                        </tr>
                        @endforeach
                        @if($topPages->isEmpty())
                        <tr><td colspan="2" class="text-center text-muted">No data yet.</td></tr>
                        @endif
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
    const labels = @json($last14->keys());
    const data   = @json($last14->values());

    new Chart(document.getElementById('visitChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Visits',
                data: data,
                backgroundColor: 'rgba(60,141,188,0.7)',
                borderColor: 'rgba(60,141,188,1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
        }
    });
</script>
@endsection
