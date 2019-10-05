@extends('layouts.app')

@include('layouts.jumbotron')

{{-- content page here --}}
@section('content')
    {{-- About Section --}}
    <section class="about" id="about">
        <div class="container">
            <div class="about-header">
                <span class="background-point">1</span>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END About Section --}}

    
    {{-- Services --}}
    <section class="service" id="service">
        <div class="container">
            <div class="service-header">
                <span class="background-point">2</span>
                <h2>Layanan</h2>
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
@endsection

