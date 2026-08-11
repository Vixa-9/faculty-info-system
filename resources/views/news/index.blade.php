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
            <h4 class="m-0 text-uppercase font-weight-bold">News</h4>
        </div>
        <div class="row">
            @forelse($news as $item)
                <div class="col-lg-6 mb-4">
                    <div class="position-relative">
                        @if($item->image)
                            <img class="img-fluid w-100" src="{{ $item->image }}" style="height:200px; object-fit:cover;" alt="{{ $item->title }}">
                        @endif
                        <div class="bg-white border border-top-0 p-4" style="color:#333;">
                            @if($item->published_at)
                                <small class="text-muted">{{ $item->published_at->format('d/m/Y') }}</small>
                            @endif
                            <a class="h5 d-block mt-1 mb-2 text-secondary font-weight-bold" href="/news/{{ $item->id }}">
                                {{ $item->title }}
                            </a>
                            <p class="text-muted">{{ Str::limit($item->summary, 150) }}</p>
                            <a href="/news/{{ $item->id }}" class="btn btn-sm btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">No news available.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-3">
            {!! $news->links("pagination::bootstrap-4") !!}
        </div>
    </div>
</div>

@include('footer')
</body>
</html>
