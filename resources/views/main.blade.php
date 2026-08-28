<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
@include('header')


<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">

                @foreach($slides as $slide)
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="{{$slide->image}}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                               href="">FET</a>
                            <a class="text-white" href=""><small>{{ $slide->created_at->format('d/m/Y') }}</small></a>
                        </div>
                        @if($slide->name)
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="{{ $slide->url ?? '' }}">{{ $slide->name }}</a>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="/template/img/1_21nam_20260529.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="">Admissions</a>
                                <a class="text-white" href=""><small></small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="/template/img/2_21nam_20260529.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="">Job opportunities</a>
                                <a class="text-white" href=""><small></small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="/template/img/6a1962a77f958.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="">Conference - Seminar</a>
                                <a class="text-white" href=""><small></small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="/template/img/0_dat-kiem-dinh-chat-luong.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="">Quality control</a>
                                <a class="text-white" href=""><small></small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->


<!-- Breaking News Start -->
<div class="container-fluid bg-dark py-3 mb-3">
    <div class="container">
        <div class="row align-items-center bg-dark">
            <div class="col-12">
                <div class="d-flex align-items-center" style="overflow:hidden;">
                    <div class="bg-primary text-dark text-center font-weight-medium py-2 flex-shrink-0 d-none d-sm-flex align-items-center justify-content-center" style="width:130px;font-size:0.82rem;">Featured News</div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-0 ml-sm-3"
                         style="min-width:0;flex:1;padding-right:90px;overflow:hidden;">
                        @foreach($featured as $item)
                        <div class="text-truncate">
                            <a class="text-white text-uppercase font-weight-semi-bold" href="/news/{{ $item->id }}">{{ $item->title }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->


<!-- Faculty Introduction Start -->
@if(!empty($facultyIntro))
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.home_faculty_intro') }}</h4>
            <a href="/about" class="text-secondary font-weight-medium text-decoration-none">{{ __('site.home_learn_more') }} &rarr;</a>
        </div>
        <div class="bg-white border p-4" style="color:#333; font-size:0.95rem; line-height:1.7;">
            {!! Str::limit(strip_tags($facultyIntro), 600) !!}
        </div>
    </div>
</div>
@endif
<!-- Faculty Introduction End -->


<!-- Our Departments Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.home_our_departments') }}</h4>
            <a href="/departments" class="text-secondary font-weight-medium text-decoration-none">{{ __('site.home_view_all') }}</a>
        </div>
        <div class="row" style="justify-content:flex-start;">
            @foreach($departments as $dept)
            <div class="col-6 col-md-4 col-lg mb-3">
                <a href="/departments/{{ $dept->slug }}" class="text-decoration-none">
                    <div class="bg-white border p-3 h-100 text-center" style="color:#333; transition:box-shadow .2s;"
                         onmouseover="this.style.boxShadow='0 2px 10px rgba(26,79,138,.15)'"
                         onmouseout="this.style.boxShadow=''">
                        <div style="width:48px;height:48px;background:#1a4f8a;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;">
                            <i class="fas fa-building" style="color:#f6c500;font-size:1.1rem;"></i>
                        </div>
                        <div style="font-weight:700;font-size:0.82rem;color:#1a4f8a;line-height:1.3;">{{ $dept->name }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Our Departments End -->


<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Notification</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            @foreach($featured as $item)
            <div class="position-relative overflow-hidden" style="height: 300px;">
                @if($item->image)
                    <img class="img-fluid h-100 w-100" src="{{ $item->image }}" style="object-fit: cover;">
                @else
                    <img class="img-fluid h-100 w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                @endif
                <div class="overlay">
                    <div class="mb-2">
                        @if($item->published_at)
                            <a class="text-white" href="/news/{{ $item->id }}"><small>{{ $item->published_at->format('d/m/Y') }}</small></a>
                        @endif
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="/news/{{ $item->id }}">{{ $item->title }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Featured News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.home_latest_news') }}</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="/news">{{ __('site.home_all_news') }}</a>
                        </div>
                    </div>
                    @foreach($latestNews->take(4) as $item)
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            @if($item->image)
                                <img class="img-fluid w-100" src="{{ $item->image }}" style="height:200px; object-fit: cover;">
                            @else
                                <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="height:200px; object-fit: cover;">
                            @endif
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="/news/{{ $item->id }}">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Information about the field of study</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Student Union</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="/template/img/news-700x435-1.jpg" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-lg-4">
                <!-- Video Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Video</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <a href=""><img class="img-fluid" src="/template/img/news-800x500-2.jpg" alt=""></a>
                    </div>
                </div>
                <!-- Video End -->

                <!-- Thông Tin Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Information</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <div class="d-flex align-items-center bg-white mb-3" style="min-height:110px;height:auto;">
                            <img class="img-fluid" src="/template/img/news-110x110-1.jpg" alt="">
                            <div class="w-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="padding-top:8px;padding-bottom:8px;min-width:0;">
                                <div class="mb-2" style="min-width:0;">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="" style="white-space:normal;word-break:break-word;display:inline-block;">International Cooperation</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="min-height:110px;height:auto;">
                            <img class="img-fluid" src="/template/img/news-110x110-2.jpg" alt="">
                            <div class="w-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="padding-top:8px;padding-bottom:8px;min-width:0;">
                                <div class="mb-2" style="min-width:0;">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="" style="white-space:normal;word-break:break-word;display:inline-block;">Scholarship</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="min-height:110px;height:auto;">
                            <img class="img-fluid" src="/template/img/news-110x110-3.jpg" alt="">
                            <div class="w-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="padding-top:8px;padding-bottom:8px;min-width:0;">
                                <div class="mb-2" style="min-width:0;">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="" style="white-space:normal;word-break:break-word;display:inline-block;">Graduation internship</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="min-height:110px;height:auto;">
                            <img class="img-fluid" src="/template/img/news-110x110-4.jpg" alt="">
                            <div class="w-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="padding-top:8px;padding-bottom:8px;min-width:0;">
                                <div class="mb-2" style="min-width:0;">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="" style="white-space:normal;word-break:break-word;display:inline-block;">Student Club</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="min-height:110px;height:auto;">
                            <img class="img-fluid" src="/template/img/news-110x110-5.jpg" alt="">
                            <div class="w-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="padding-top:8px;padding-bottom:8px;min-width:0;">
                                <div class="mb-2" style="min-width:0;">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="" style="white-space:normal;word-break:break-word;display:inline-block;">Student support</a>
                                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thông Tin End -->

                <!-- Liên Kết Trang Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Page Links</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <a href="https://accounts.google.com/signin" class="d-flex align-items-center w-100 text-white text-decoration-none mb-3" style="background:blue;">
                            <i class="fas fa-envelope text-center py-4 mr-3 flex-shrink-0" style="width:65px;background:rgba(0,0,0,.2);"></i>
                            <span style="color:#ffffdd;text-transform:uppercase;font-weight:bolder;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">Email</span>
                        </a>

                        <a href="http://dhtg.vpdttg.vn/" class="d-flex align-items-center w-100 text-white text-decoration-none mb-3" style="background:#DC472E;">
                            <i class="fas fa-mail-bulk text-center py-4 mr-3 flex-shrink-0" style="width:65px;background:rgba(0,0,0,.2);"></i>
                            <span style="color:#ffffdd;text-transform:uppercase;font-weight:bolder;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">Electronic Office</span>
                        </a>

                        <a href="http://qldt.tgu.edu.vn/" class="d-flex align-items-center w-100 text-white text-decoration-none mb-3" style="background:#52AAF4;">
                            <i class="fas fa-book-reader text-center py-4 mr-3 flex-shrink-0" style="width:65px;background:rgba(0,0,0,.2);"></i>
                            <span style="color:#ffffdd;text-transform:uppercase;font-weight:bolder;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">Training management</span>
                        </a>
                        <a href="" class="d-flex align-items-center w-100 text-white text-decoration-none mb-3" style="background:#C8359D;">
                            <i class="fas fa-university text-center py-4 mr-3 flex-shrink-0" style="width:65px;background:rgba(0,0,0,.2);"></i>
                            <span style="color:#ffffdd;text-transform:uppercase;font-weight:bolder;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">Library</span>
                        </a>
                    </div>
                </div>
                <!-- Liên Kết Trang End -->

                <!-- Lượt Truy Cập Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Website Visits</h4>
                    </div>
                    <div class="bg-white text-left border border-top-0 p-3">
                        <div>
                            <img class="img-fluid" src="/template/img/user2.png" alt="" style="width:20px; text-align: left">
                            <span style="color: blue; font-weight: bolder; text-align: left">Today</span>
                        </div>
                        <div>
                            <img class="img-fluid" src="/template/img/user3.png" alt="" style="width:20px; text-align: left">
                            <span style="color: blue; font-weight: bolder">This week</span>
                        </div>
                        <div>
                            <img class="img-fluid" src="/template/img/user4.png" alt="" style="width:20px; text-align: left">
                            <span  style="color: blue; font-weight: bolder">This month</span>
                        </div>
                        <div>
                            <img class="img-fluid" src="/template/img/statistic.png" alt="" style="width:20px; text-align: left">
                            <span style="color: blue; font-weight: bolder">Total visits</span>
                        </div>
                        <div style="color: blue; font-weight: bolder">
                            <img class="img-fluid" src="/template/img/user1.png" alt="" style="width:20px; text-align: left">Số người online:
                            <script type="text/javascript" src="//widget.supercounters.com/ssl/online_i.js"></script>
                            <script type="text/javascript" style="font-weight: bolder"> sc_online_i(1612095,"#ffffff","1100ff");</script>
                            <noscript><a href="http://www.supercounters.com/" class="disabled">Supercounters</a></noscript>
                        </div>
                    </div>
                </div>
                <!-- Lượt Truy Cập End -->

                <!-- Cac Website Lien Ket Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Linked Websites</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <div class="form-group" data-select2-id="73">
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="3">Ministry of Education and Training</option>
                                <option data-select2-id="75">Tien Giang University</option>
                                <option data-select2-id="76">Can Tho University</option>
                                <option data-select2-id="77">Ho Chi Minh City National University</option>
                                <option data-select2-id="78">Hue University</option>
                                <option data-select2-id="79">Ho Chi Minh City University of Education</option>
                                <option data-select2-id="80">Tra Vinh University</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Cac Website Lien Ket End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<!-- Featured Research Start -->
@if($featuredResearch->isNotEmpty())
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.home_featured_research') }}</h4>
            <a href="/research" class="text-secondary font-weight-medium text-decoration-none">{{ __('site.home_all_research') }}</a>
        </div>
        <div class="row" style="justify-content:flex-start;">
            @foreach($featuredResearch as $activity)
            @php
                $badgeColor = [
                    'Research Project' => '#1a4f8a',
                    'Publication'      => '#28a745',
                    'Conference'       => '#17a2b8',
                    'Workshop'         => '#e6a817',
                    'Award'            => '#dc3545',
                ][$activity->type] ?? '#6c757d';
            @endphp
            <div class="col-md-4 mb-3">
                <div class="bg-white border p-3 h-100 d-flex flex-column" style="color:#333;">
                    <span style="display:inline-block;background:{{ $badgeColor }};color:#fff;font-size:0.7rem;font-weight:600;padding:2px 7px;border-radius:3px;margin-bottom:8px;align-self:flex-start;">
                        {{ __('site.type_' . $activity->type) }}
                    </span>
                    <div style="font-weight:700;font-size:0.9rem;margin-bottom:6px;line-height:1.3;">{{ $activity->title }}</div>
                    @if($activity->authors)
                        <div style="font-size:0.78rem;color:#888;">
                            <i class="fas fa-users mr-1"></i>{{ $activity->authors }}
                        </div>
                    @endif
                    @if($activity->date)
                        <div style="font-size:0.75rem;color:#aaa;margin-top:4px;">
                            <i class="far fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($activity->date)->format('d/m/Y') }}
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Featured Research End -->


<!-- Student Projects Start -->
@if($featuredProjects->isNotEmpty())
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.student_projects') }}</h4>
            <a href="/student-projects" class="text-secondary font-weight-medium text-decoration-none">{{ __('site.home_all_projects') }}</a>
        </div>
        <div class="row" style="justify-content:flex-start;">
            @foreach($featuredProjects as $project)
            <div class="col-md-4 mb-3">
                <div class="bg-white border p-3 h-100 d-flex flex-column" style="color:#333;">
                    @if($project->award)
                        <div style="margin-bottom:6px;">
                            <span style="background:#e6a817;color:#1a1a1a;font-size:0.7rem;font-weight:700;padding:2px 7px;border-radius:3px;">
                                <i class="fas fa-trophy mr-1"></i>{{ $project->award }}
                            </span>
                        </div>
                    @endif
                    <div style="font-weight:700;font-size:0.9rem;margin-bottom:8px;line-height:1.3;">{{ $project->title }}</div>
                    <div style="font-size:0.78rem;color:#888;margin-bottom:4px;">
                        @if($project->department)
                            <span class="mr-2"><i class="fas fa-building mr-1"></i>{{ $project->department }}</span>
                        @endif
                        @if($project->year)
                            <span><i class="far fa-calendar mr-1"></i>{{ $project->year }}</span>
                        @endif
                    </div>
                    @if($project->team_members)
                        <div style="font-size:0.77rem;color:#666;margin-top:auto;padding-top:6px;">
                            <i class="fas fa-users mr-1 text-muted"></i>{{ Str::limit($project->team_members, 60) }}
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Student Projects End -->


<!-- Quick Links Start -->
<div class="container-fluid pt-5 mb-5">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.home_quick_links') }}</h4>
        </div>
        <div class="row" style="justify-content:flex-start;">
            @php
            $quickLinks = [
                ['url' => '/about',           'icon' => 'fa-university',       'label' => __('site.nav_about_faculty')],
                ['url' => '/departments',     'icon' => 'fa-building',         'label' => __('site.nav_departments_link')],
                ['url' => '/lecturers',       'icon' => 'fa-chalkboard-teacher','label' => __('site.nav_lecturers_link')],
                ['url' => '/research',        'icon' => 'fa-flask',            'label' => __('site.nav_research_activities')],
                ['url' => '/student-projects','icon' => 'fa-project-diagram',  'label' => __('site.nav_student_projects')],
                ['url' => '/news',            'icon' => 'fa-rss',              'label' => __('site.nav_news_link')],
            ];
            @endphp
            @foreach($quickLinks as $link)
            <div class="col-6 col-md-4 col-lg-2 mb-3">
                <a href="{{ $link['url'] }}" class="text-decoration-none d-block text-center bg-white border p-3"
                   style="color:#1a4f8a; transition:box-shadow .2s;"
                   onmouseover="this.style.boxShadow='0 2px 10px rgba(26,79,138,.15)'"
                   onmouseout="this.style.boxShadow=''">
                    <i class="fas {{ $link['icon'] }} fa-lg mb-2 d-block" style="color:#1a4f8a;"></i>
                    <div style="font-size:0.8rem;font-weight:600;line-height:1.2;">{{ $link['label'] }}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Quick Links End -->


@include('footer')
</body>

</html>

<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.5rem;
        margin-left: -0.5rem;
        align-content: flex-start;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }
</style>
