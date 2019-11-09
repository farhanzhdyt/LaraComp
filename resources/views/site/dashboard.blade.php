@extends('site.layouts.app')

@section('title')
    Dashboard
@endsection

@section('page-title')
    Dashboard
@endsection

@section('content-page')
<!-- start info box -->

@if(auth()->user()->level === "ADMIN_PROFILE" || auth()->user()->level === "ADMIN")
<div class="card">
    <div class="card-header">
        Total of Company Profile
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-success rounded text-light ">
                    <span class="oi top-0 rounded-left bg-white text-success h-100 p-4 oi-sun fs-5"></span>
                    <div class="media-body p-2">
                    <h6 class="media-title m-0">Team</h6>
                        <div class="media-text">
                            <h3>{{ $team }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-dark-lighter text-white rounded ">
                    <span class="oi top-0 rounded-left bg-white text-dark h-100 p-4 oi-laptop fs-5"></span>
                    <div class="media-body p-2">
                        <h6 class="media-title m-0">Product</h6>
                        <div class="media-text">
                            <h3>{{ $products }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-info-lighter text-light rounded ">
                    <span class="oi top-0 rounded-left bg-white text-info h-100 p-4 oi-dollar fs-5"></span>
                    <div class="media-body p-2">
                        <h6 class="media-title m-0">Pricing</h6>
                        <div class="media-text">
                            <h3>{{ $pricing }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-warning-lighter text-light rounded ">
                    <span class="oi top-0 rounded-left bg-white text-warning h-100 p-4 oi-comment-square fs-5"></span>
                    <div class="media-body p-2">
                        <h6 class="media-title m-0">Testimonial</h6>
                        <div class="media-text">
                            <h3>{{ $testi }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-blue text-light rounded ">
                    <span class="oi top-0 rounded-left bg-white text-blue h-100 p-4 oi-paperclip fs-5"></span>
                    <div class="media-body p-2">
                        <h6 class="media-title m-0">Careers</h6>
                        <div class="media-text">
                            <h3>{{ $careers }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-light-darkest text-light rounded ">
                    <span class="oi top-0 rounded-left bg-white text-light-darkest h-100 p-4 oi-paperclip fs-5"></span>
                    <div class="media-body p-2">
                        <h6 class="media-title m-0">Services</h6>
                        <div class="media-text">
                            <h3>{{ $services }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<br>

@if(auth()->user()->level === "ADMIN_BERITA" || auth()->user()->level === "ADMIN")
<div class="card">
    <div class="card-header">
        Total of Articles, Users, and Categories
    </div>

    <div class="card-body">
        <div class="row">
            @if(auth()->user()->level === "ADMIN")
            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-dark rounded text-light ">
                    <span class="oi top-0 rounded-left bg-white text-dark h-100 p-4 oi-people fs-5"></span>
                    <div class="media-body p-2">
                    <h6 class="media-title m-0">Users</h6>
                        <div class="media-text">
                            <h3>{{ $users }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-info-darkest text-light rounded ">
                    <span class="oi top-0 rounded-left bg-white text-info-darkest h-100 p-4 oi-signpost fs-5"></span>
                    <div class="media-body p-2">
                        <h6 class="media-title m-0">News</h6>
                        <div class="media-text">
                            <h3>{{ $news }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                <div class="media shadow-sm p-0 bg-success-darkest text-light rounded ">
                    <span class="oi top-0 rounded-left bg-white text-success-darkest h-100 p-4 oi-tag fs-5"></span>
                    <div class="media-body p-2">
                        <h6 class="media-title m-0">Category News</h6>
                        <div class="media-text">
                            <h3>{{ $categories }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- end info box -->
@endsection