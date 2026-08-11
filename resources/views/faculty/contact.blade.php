<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('head')
</head>
<body>
@include('header')

<div class="container-fluid pt-5 mb-5">
    <div class="container">

        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ __('site.contact_us') }}</h4>
        </div>

        <div class="row">

            {{-- Faculty Office --}}
            <div class="col-md-6 mb-4">
                <div class="bg-white border h-100 p-4" style="color:#333;">
                    <h5 style="color:#1a4f8a;font-weight:700;margin-bottom:20px;padding-bottom:10px;border-bottom:2px solid #1a4f8a;">
                        <i class="fas fa-university mr-2"></i>{{ __('site.contact_faculty_office') }}
                    </h5>

                    @if(!empty($contact['contact_address']))
                    <div class="d-flex mb-3" style="gap:14px;align-items:flex-start;">
                        <div style="width:36px;height:36px;background:#1a4f8a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-map-marker-alt" style="color:#f6c500;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem;font-weight:700;color:#888;text-transform:uppercase;margin-bottom:2px;">{{ __('site.contact_address') }}</div>
                            <div style="font-size:0.92rem;line-height:1.5;">{{ $contact['contact_address'] }}</div>
                        </div>
                    </div>
                    @endif

                    @if(!empty($contact['contact_phone']))
                    <div class="d-flex mb-3" style="gap:14px;align-items:flex-start;">
                        <div style="width:36px;height:36px;background:#1a4f8a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-phone-alt" style="color:#f6c500;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem;font-weight:700;color:#888;text-transform:uppercase;margin-bottom:2px;">{{ __('site.contact_phone') }}</div>
                            <div style="font-size:0.92rem;">
                                <a href="tel:{{ preg_replace('/\s+/', '', $contact['contact_phone']) }}" style="color:#1a4f8a;">{{ $contact['contact_phone'] }}</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(!empty($contact['contact_email']))
                    <div class="d-flex mb-3" style="gap:14px;align-items:flex-start;">
                        <div style="width:36px;height:36px;background:#1a4f8a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-envelope" style="color:#f6c500;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem;font-weight:700;color:#888;text-transform:uppercase;margin-bottom:2px;">{{ __('site.contact_email') }}</div>
                            <div style="font-size:0.92rem;">
                                <a href="mailto:{{ $contact['contact_email'] }}" style="color:#1a4f8a;">{{ $contact['contact_email'] }}</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(!empty($contact['contact_office_location']))
                    <div class="d-flex mb-3" style="gap:14px;align-items:flex-start;">
                        <div style="width:36px;height:36px;background:#1a4f8a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-building" style="color:#f6c500;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem;font-weight:700;color:#888;text-transform:uppercase;margin-bottom:2px;">{{ __('site.contact_office_location') }}</div>
                            <div style="font-size:0.92rem;">{{ $contact['contact_office_location'] }}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- IT Department --}}
            <div class="col-md-6 mb-4">
                <div class="bg-white border h-100 p-4" style="color:#333;">
                    <h5 style="color:#1a4f8a;font-weight:700;margin-bottom:20px;padding-bottom:10px;border-bottom:2px solid #1a4f8a;">
                        <i class="fas fa-laptop-code mr-2"></i>{{ __('site.contact_it_department') }}
                    </h5>

                    @if(!empty($contact['contact_it_department_phone']))
                    <div class="d-flex mb-3" style="gap:14px;align-items:flex-start;">
                        <div style="width:36px;height:36px;background:#1a4f8a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-phone-alt" style="color:#f6c500;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem;font-weight:700;color:#888;text-transform:uppercase;margin-bottom:2px;">{{ __('site.contact_phone') }}</div>
                            <div style="font-size:0.92rem;">{{ $contact['contact_it_department_phone'] }}</div>
                        </div>
                    </div>
                    @endif

                    @if(!empty($contact['contact_it_department_email']))
                    <div class="d-flex mb-3" style="gap:14px;align-items:flex-start;">
                        <div style="width:36px;height:36px;background:#1a4f8a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-envelope" style="color:#f6c500;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem;font-weight:700;color:#888;text-transform:uppercase;margin-bottom:2px;">{{ __('site.contact_email') }}</div>
                            <div style="font-size:0.92rem;">
                                <a href="mailto:{{ $contact['contact_it_department_email'] }}" style="color:#1a4f8a;">{{ $contact['contact_it_department_email'] }}</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Placeholder if both fields empty --}}
                    @if(empty($contact['contact_it_department_phone']) && empty($contact['contact_it_department_email']))
                    <p class="text-muted">{{ __('site.contact_us') }} — information not yet available.</p>
                    @endif
                </div>
            </div>

        </div>

        {{-- Map embed --}}
        <div class="bg-white border p-0 mb-4" style="overflow:hidden;">
            <iframe
                src="https://maps.google.com/maps?q=Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+Ti%E1%BB%81n+Giang&output=embed"
                width="100%" height="320" style="border:0;display:block;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>
</div>

@include('footer')
</body>
</html>
