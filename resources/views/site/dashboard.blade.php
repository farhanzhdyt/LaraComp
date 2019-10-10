@extends('site.layouts.app')

@section('title')
    Dashboard
@endsection

@section('page-title')
    Dashboard
@endsection

@section('content-page')
<!-- start info box -->
    <div class="row ">
        <div class="col-md-12 pl-3 pt-2">
            <div class="row pl-3">

                <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                    <div class="media shadow-sm p-0 bg-white rounded text-primary ">
                        <span class="oi top-0 rounded-left bg-primary text-light h-100 p-4 oi-laptop fs-5"></span>
                        <div class="media-body p-2">
                        <h6 class="media-title m-0">Products</h6>
                            <div class="media-text">
                                <h3>{{ $products }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                    <div class="media shadow-sm p-0 bg-white rounded text-primary ">
                        <span class="oi top-0 rounded-left bg-success text-light h-100 p-4 oi-dollar fs-5"></span>
                        <div class="media-body p-2">
                        <h6 class="media-title m-0">Pricing</h6>
                            <div class="media-text">
                                <h3>{{ $pricing }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                    <div class="media shadow-sm p-0 bg-warning-lighter text-primary-darker rounded ">
                        <span class="oi top-0 rounded-left bg-white text-warning h-100 p-4 oi-cart fs-5"></span>
                        <div class="media-body p-2">
                            <h6 class="media-title m-0">Store Visits</h6>
                            <div class="media-text">
                                <h3>58493</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                    <div class="media shadow-sm p-0 bg-info-lighter text-light rounded ">
                        <span class="oi top-0 rounded-left bg-white text-info h-100 p-4 oi-tag fs-5"></span>
                        <div class="media-body p-2">
                            <h6 class="media-title m-0">Total Products</h6>
                            <div class="media-text">
                                <h3>23</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end info box -->
@endsection