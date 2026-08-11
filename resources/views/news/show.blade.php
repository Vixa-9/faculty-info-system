<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body>
@include('header')

<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <a href="/news" class="btn btn-sm btn-secondary mb-3">&larr; Back to news</a>

        <div class="bg-white border p-4" style="color:#333;">
            @if($news->image)
                <img class="img-fluid w-100 mb-4" src="{{ $news->image }}" style="max-height:400px; object-fit:cover;" alt="{{ $news->title }}">
            @else
                <div class="mb-4" style="height:200px;background:#e9ecef;display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-newspaper fa-4x text-muted"></i>
                </div>
            @endif

            <h2 class="font-weight-bold text-uppercase">{{ $news->title }}</h2>

            @if($news->published_at)
                <small class="text-muted">Published: {{ $news->published_at->format('d/m/Y') }}</small>
            @endif

            <p class="text-muted mt-2 mb-3"><em>{{ $news->summary }}</em></p>

            <hr>

            <div class="news-content">
                {!! $news->content !!}
            </div>
        </div>
    </div>
</div>

@include('footer')
</body>
</html>
