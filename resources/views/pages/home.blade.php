@extends('layouts.base')

@include('layouts.jumbotron')

{{-- content page here --}}
@section('content')
    {{-- About Section --}}
    <section class="about" id="about">
        <div class="container">
            <img src="{{ asset('images/blob.svg') }}" class="blob">
            <div class="about-header">
                <h2>Tentang</h2>
            </div>

            <div class="about-body">
                <div class="row">
                    <div class="col-md-6 about-info">
                        <p style="text-align: justify;">Laracomp adalah brand usaha kami di bidang IT yang memberikan layanan professional dan dibekali dengan tenaga ahli yang berpengalaman. Kami telah berkembang menjadi perusahaan IT dengan tenaga ahli yang lebih professional dan berpengalaman di bidangnya.
                        <br>
                        Visi kami ialah menjadi partner bisnis di IT yang paling dipercaya sesuai dengan tagline kami “Your Trusted IT Partner”.
                        Adapun Misi kami ialah :
                        <ul class="ml-4">
                            <li>Menjadi role model bisnis percontohan di bidang jasa IT</li>
                            <li>Mengimplementasikan teknologi dan inovasi terbaru dalam setiap jasa dan produk yang kami miliki demi kepuasan pelanggan kami</li>
                            <li>Mengutamakan kepuasan pelanggan dan asas manfaat serta nilai tambah bagi klien dan stakeholder kami</li>
                        </ul>
                        Saat ini perusahaan kami berkembang pesat menjadi salah satu Jasa IT yang banyak dikenal baik secara online maupun offline melalui kunjungan ke perumahan dan perkantoran.</p>
                    </div>
                    <div class="col-md-6 about-img">
                        <img src="{{ asset('images/company.svg') }}" class="mt-5" class="animate" alt="company" srcset="">
                    
                        {{-- <div id="map-container-google-1" class="z-depth-1-half map-container" style="display:block; height: 100%;">
                            <iframe src="https://maps.google.com/maps?q=Bandung&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                            style="border:0; width:100%;" allowfullscreen height="100%"></iframe>
                        </div> --}}
                    </div>
                </div>
            </div>

            {{-- tongue svg --}}
            <img src="{{ asset('images/tongue.svg') }}" class="tongue" alt="" srcset="">
        </div>
    </section>
    {{-- END About Section --}}

    
    {{-- Services --}}
    <section class="service" id="service">
        <div class="container">
            <div class="service-header">
                <h2 class="text-center">Layanan</h2>
            </div>

            <div class="service-body">
                <div class="row">
                    <div class="col-md-4 column">
                        <div class="card">
                            <div class="card-logo-and-title">
                                <img src="{{ asset('images/icons/customer-support.png') }}" class="icon" alt="" srcset="">
                                <h2>IT Support</h2>
                            </div>
                            <div class="card-description">
                                <p>Melayani Service & Maintenance Komputer/Laptop, Service Jaringan Komputer, Rakit Komputer dan Pengadaan Komputer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <div class="card">
                            <div class="card-logo-and-title">
                                <img src="{{ asset('images/icons/creativity.png') }}" class="icon" alt="" srcset="">
                                <h2>Corporate Design</h2>
                            </div>
                            <div class="card-description">
                                <p>Melayani Pembuatan Company Profile, Katalog Produk, Brosur dan Kartu Nama untuk Perusahaan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <div class="card">
                            <div class="card-logo-and-title">
                                <img src="{{ asset('images/icons/digital-marketing.png') }}" class="icon" alt="" srcset="">
                                <h2>Digital Marketing</h2>
                            </div>
                            <div class="card-description">
                                <p>Melayani Maintenance Digital Marketing Google Ads, Instagram Ads dan Web SEO untuk Meningkatkan Pencarian di Mesin Pencari</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END Serices --}}

    {{-- Product --}}
    <section class="product" id="product">
        <div class="container">
            <div class="product-header">
                <h2>Produk</h2>
            </div>
            <div class="product-body">
                <div class="row">
                    <div class="col-md-4 column">
                        <div class="card">
                            <div class="card-logo-and-title">
                                <img src="{{ asset('images/icons/customer-support.png') }}" class="icon" alt="" srcset="">
                                <h2>IT Support</h2>
                            </div>
                            <div class="card-description">
                                <p>Melayani Service & Maintenance Komputer/Laptop, Service Jaringan Komputer, Rakit Komputer dan Pengadaan Komputer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <div class="card">
                            <div class="card-logo-and-title">
                                <img src="{{ asset('images/icons/creativity.png') }}" class="icon" alt="" srcset="">
                                <h2>Corporate Design</h2>
                            </div>
                            <div class="card-description">
                                <p>Melayani Pembuatan Company Profile, Katalog Produk, Brosur dan Kartu Nama untuk Perusahaan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <div class="card">
                            <div class="card-logo-and-title">
                                <img src="{{ asset('images/icons/digital-marketing.png') }}" class="icon" alt="" srcset="">
                                <h2>Digital Marketing</h2>
                            </div>
                            <div class="card-description">
                                <p>Melayani Maintenance Digital Marketing Google Ads, Instagram Ads dan Web SEO untuk Meningkatkan Pencarian di Mesin Pencari</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Pricing --}}
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="pricing-header">
                <h2>Harga</h2>
            </div>

            <div class="pricing-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END Pricing --}}
@endsection

{{-- @push('script')
    <script>
        function initMap() {
            var location = {lat: -6.951919, lng: 107.642507};
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqFwQAp7wOiDc1y8YB4_cZp3BkMKUzHwk&callback=initMap"
    type="text/javascript"></script>
@endpush --}}
