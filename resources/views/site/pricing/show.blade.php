@extends('site.layouts.app')

@section('title')
    Pricing
@endsection

@section('page-title')
    Detail Service Price
@endsection

@section('content-page')

    <div class="button-back mt-3">
        <a href="{{ route('pricing.index') }}" class="btn btn-primary"><i class="oi oi-chevron-left"></i></a>
    </div>

    <section class="detail-price mt-4 mb-4">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="text-center text-uppercase">{{ $pricing->title }}</h4>
                <p>{{ $pricing->optional_description }}</p>
                <span class="price">Rp.{{ number_format($pricing->price, 0, ',', '.') }}</span>
            </div>

            <div class="card-body">
                {!! $pricing->description !!}
            </div>
        </div>
    </section>

@endsection

@push('style')
    <style>
        .detail-price {
            margin: auto;
        }

        .card {
            width: 20rem;
        }

        .card .card-header h4 {
            font-size: 16pt;
            padding: 20px;
        }

        .card .card-header p {
            color: #888;
        }

        .card .card-body ul li{
            margin: 10px auto;
            font-size: 10pt;
        }
    </style>
@endpush