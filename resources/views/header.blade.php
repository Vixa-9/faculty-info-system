 <style>
    .reverse-list {
        display: flex;
        flex-direction: row-reverse;
    }
    .bg-dark {
        background-color: var(--blue) !important;
    }
    body {
        margin: 0;
        font-family: "Montserrat", sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: var(--white);
        text-align: left;
        background-color: #EDEFF4;
    }
    .text-body {
        color: var(--white) !important;
        text-transform: uppercase;
        font-weight: bold;
    }
    .section-title {
        margin-bottom: 15px;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #FFFFFF;
        border: 1px solid #dee2e6;
        border-left: 5px solid var(--blue);
    }
    .font-weight-medium {
        font-weight: 500 !important;
        color: var(--blue);
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.5rem;
        margin-left: -0.5rem;
        align-content: space-between;
        justify-content: space-between;
        align-items: center;
    }
    .text-primary {
        color: var(--light) !important;
        font-size: inherit;
    }
    .navbar-nav .nav-link {
        font-size: 0.82rem;
        padding-left: 0.55rem;
        padding-right: 0.55rem;
        white-space: nowrap;
    }
    .navbar-nav .dropdown-toggle {
        font-size: 0.82rem;
    }
</style>
 <script language='javascript'>
     var myVar=setInterval(function(){Clock()},1000);
     function Clock() {
         a=new Date();
         w=Array("Sun","Monday","Tuesday","Wednesday","Thurday","Friday","Saturday");
         var a=w[a.getDay()],
             w=new Date,
             d=w.getDate();
         m=w.getMonth()+1;
         y=w.getFullYear();
         h=w.getHours();
         mi=w.getMinutes();
         se=w.getSeconds();
         if(10>d){d="0"+d}
         if(10>m){m="0"+m}
         if(10>h){h="0"+h}
         if(10>mi){mi="0"+mi}
         if(10>se){se="0"+se}
         document.getElementById("clockDiv").innerHTML="Today: "+a+", "+d+" / "+m+" / "+y+" - "+h+":"+mi+":"+se+"";
     }
 </script>

<!-- Topbar Start -->
 <div class="container-fluid d-none d-lg-block">
     <div class="row align-items-center bg-dark px-lg-5">
         <div class="col-lg-9">
             <nav class="navbar navbar-expand-sm bg-dark p-0">
                 <a class="nav-link text-body small" href="http://tgu.edu.vn">
                   <i class="fas fa-home"></i> Tien Giang University Homepage</a>
             </nav>
         </div>

         <div class="col-lg-3 text-right d-none d-md-block">
             <nav class="navbar navbar-expand-sm bg-dark p-0">
                 <ul class="navbar-nav ml-auto mr-n2">
                     <div class="clockDiv">
                         <a class="nav-link text-body small"><div id="clockDiv"></div></a>
                     </div>
                 </ul>
             </nav>
         </div>

     </div>

     <div class="row align-items-center bg-white py-3 px-lg-5">
         <div class="col-lg-6">
             <a class="navbar-brand p-0 d-none d-lg-block">
                 <img class="img-fluid" src="{{'/images/logo/'.$logo->description}}" alt="Trường Đại học Tiền Giang">
             </a>
         </div>

         <div class="col-lg-2">
         </div>

         <div class="col-lg-4">
             <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>{{$phone->description}}</p>
             <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>{{$email->description}}</p>
             <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>{{$address1->description}}</p>
             <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>{{$address2->description}}</p>
         </div>
     </div>


 </div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">{{$company->description}}</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">

                <a href="/" class="nav-item nav-link">{{ __('site.nav_home') }}</a>

                <div class="nav-item dropdown">
                    <a href="/about" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('site.nav_about_dropdown') }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="/about" class="dropdown-item">{{ __('site.nav_about_faculty') }}</a>
                        <a href="/departments/faculty-office" class="dropdown-item">{{ __('site.nav_faculty_office') }}</a>
                        <a href="/departments" class="dropdown-item">{{ __('site.nav_departments_link') }}</a>
                        <a href="/lecturers" class="dropdown-item">{{ __('site.nav_lecturers_link') }}</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="/dccthp" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('site.nav_education') }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="/dccthp" class="dropdown-item">{{ __('site.nav_training_programs') }}</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('site.nav_admissions') }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="#" class="dropdown-item">{{ __('site.nav_admission_info') }}</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="/research" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('site.nav_research_dropdown') }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="/research" class="dropdown-item">{{ __('site.nav_research_activities') }}</a>
                    </div>
                </div>

                <a href="https://tgu.edu.vn/topic/?13398" target="_blank" rel="noopener" class="nav-item nav-link">{{ __('site.nav_procedures') }}</a>

                <a href="/student-projects" class="nav-item nav-link">{{ __('site.nav_student_projects') }}</a>

                <div class="nav-item dropdown">
                    <a href="/news" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('site.nav_news_dropdown') }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="/news" class="dropdown-item">{{ __('site.nav_news_link') }}</a>
                        <a href="#" class="dropdown-item">{{ __('site.nav_announcements') }}</a>
                    </div>
                </div>

                <a href="contact.html" class="nav-item nav-link">{{ __('site.nav_contact') }}</a>

            </div>

            <div class="input-group ml-auto d-none d-lg-flex" style="width: 50%; max-width: 190px;">
                <input type="text" class="form-control border-0" placeholder="Keyword">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"></i></button>
                </div>
            </div>

            <div class="ml-3 d-flex align-items-center" style="gap:6px;">

                {{-- Language switcher --}}
                @php $currentLocale = app()->getLocale(); @endphp
                <a href="/language/en"
                   style="font-size:0.75rem;font-weight:700;padding:4px 8px;border-radius:3px;text-decoration:none;border:1px solid rgba(255,255,255,0.4);
                          {{ $currentLocale === 'en' ? 'background:#f6c500;color:#1a1a1a;border-color:#f6c500;' : 'background:transparent;color:#fff;' }}">
                    EN
                </a>
                <a href="/language/vi"
                   style="font-size:0.75rem;font-weight:700;padding:4px 8px;border-radius:3px;text-decoration:none;border:1px solid rgba(255,255,255,0.4);margin-right:8px;
                          {{ $currentLocale === 'vi' ? 'background:#f6c500;color:#1a1a1a;border-color:#f6c500;' : 'background:transparent;color:#fff;' }}">
                    VI
                </a>

                @auth
                    <a href="/admin" style="background:#f6c500;color:#1a1a1a;font-weight:600;font-size:0.8rem;padding:6px 14px;border-radius:3px;text-decoration:none;margin-right:8px;white-space:nowrap;">
                        <i class="fas fa-tachometer-alt mr-1"></i>{{ __('site.nav_admin_panel') }}
                    </a>
                    <form action="/admin/logout" method="POST" class="m-0">
                        @csrf
                        <button type="submit" style="background:transparent;border:1px solid rgba(255,255,255,0.5);color:#fff;font-size:0.8rem;padding:6px 14px;border-radius:3px;cursor:pointer;white-space:nowrap;">
                            <i class="fas fa-sign-out-alt mr-1"></i>{{ __('site.nav_logout') }}
                        </button>
                    </form>
                @else
                    <a href="/admin/users/login" style="background:#f6c500;color:#1a1a1a;font-weight:600;font-size:0.8rem;padding:6px 14px;border-radius:3px;text-decoration:none;white-space:nowrap;">
                        <i class="fas fa-sign-in-alt mr-1"></i>{{ __('site.nav_login') }}
                    </a>
                @endauth
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
