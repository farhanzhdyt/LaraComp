@extends('layouts.base')

@include('layouts.jumbotron')

{{-- content page here --}}
@section('content')
    {{-- About Section --}}
    <section class="about" id="about">
        <div class="container">
            <div class="about-header">
                <h2>Tentang</h2>
            </div>

            <div class="about-body">
                <div class="row">
                    <div class="col-md-6 about-info">
                        <p style="text-align: justify;">Laracomp adalah brand usaha kami di bidang IT yang memberikan layanan professional dan dibekali dengan tenaga ahli yang berpengalaman. Kami telah berkembang menjadi perusahaan IT dengan tenaga ahli yang lebih professional dan berpengalaman di bidangnya.
                        </p>
                        <p>
                        Saat ini perusahaan kami berkembang pesat menjadi salah satu Jasa IT yang banyak dikenal baik secara online maupun offline melalui kunjungan ke perumahan dan perkantoran.</p>

                        <a href="" class="btn btn-primary">Info Lebih Lanjut</a>
                    </div>
                    <div class="col-md-6 about-img">
                        <img src="{{ asset('images/company.svg') }}" class="mt-5" class="animate" alt="company" srcset="">
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
                                <p>Melayani Pembuatan Katalog Produk, Brosur dan Kartu Nama untuk Perusahaan</p>
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

    

    {{-- Pricing --}}
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="pricing-header">
                <h2>Harga</h2>
            </div>

            <div class="pricing-body">
                <div class="row">
                    @foreach($pricing as $price)
                    <div class="col-md-4 column">
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ $price->title }}</h2>
                                <span class="optional_description">{{ $price->optional_description }}</span>
                                <br>
                                <span class="price">Rp. {{ number_format($price->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="card-body">
                                <p>{{ $price->description }}</p>
                            </div>
                            <div class="card-button">
                                <a href="https://api.whatsapp.com/send?phone=6287744411262&text=Hallo%Cungur" class="btn btn-primary btn-order">ORDER VIA WHATSAPP</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- END Pricing --}}
@endsection

@push('script')
    <script>
        function initMap() {
            var location = {lat: -6.951919, lng: 107.642507};
            var map = document.getElementById('map-container-google-1');
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqFwQAp7wOiDc1y8YB4_cZp3BkMKUzHwk&callback=initMap"
    type="text/javascript"></script>
@endpush
