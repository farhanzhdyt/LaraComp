@extends('layouts.base')

@include('layouts.jumbotron')

@section('content')
{{-- Services --}}
<section class="services">
    <div class="container">
        <div class="service-header">
            <h2 class="helvetica-bold">Pelayanan <span class="helvetica-bold" style="color: #000;">Kami</span></h2>
        </div>

        <div class="service-body">
            <div class="row">
                @foreach($services as $service)
                <div class="col-md-4 column" data-aos="zoom-in">
                    <div class="card">
                        <div class="text-center">
                            <img src="{{ asset('images/service/' .$service->image) }}" alt="" srcset="">
                        </div>
                        <div class="description">
                            <h3 class="small-title bold">
                                {!! $service->title !!}
                            </h3>
                            {!! $service->description !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- END Services --}}

{{-- Pricing --}}
<section class="price">
    <div class="container">
        <div class="price-header">
            <h2 class="helvetica-bold">Harga <span class="helvetica-bold" style="color: #000;">Pelayanan</span></h2>
        </div>

        <div class="price-body">
            <div class="row">
                @foreach ($pricing as $price)    
                    <div class="col-md-4 column" data-aos="zoom-in">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="title">{{ $price->title }}</h3>
                                <p class="pricing">Rp.{{ number_format($price->price, 0, '.', ',') }}</p>
                                <p class="optional-description">{{ $price->optional_description }}</p>
                            </div>

                            <div class="card-body">
                                {!! $price->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- END Pricing --}}

{{-- Testimonial --}}
<section class="testimonial">
    <div class="container">
        <div class="testi-header">
            <h2 class="helvetica-bold">Apa kata <span class="helvetica-bold" style="color: #000;">mereka?</span></h2>
        </div>

        <div class="testi-body">
            <div class="row">
                @foreach($testi as $t)
                <div class="column col-md-4" data-aos="zoom-in">
                    <div class="card">
                        <div class="card-body" style="font-style: italic;">
                            "{!! $t->review !!}"
                        </div>
                        <div class="card-footer border-0 bold" style="background-color: unset;">
                            {{ $t->client_name }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- END Testimonial --}}
@endsection