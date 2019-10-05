@extends('site.layouts.app')

@section('title')
    Product Detail
@endsection

@section('page-title')
    {{ $product->name }}
@endsection

@section('content-page')

<div class="row">
    <div class="col-md-6 my-3">
        <a href="{{ route('products.index') }}" class="btn btn-primary"><i class="oi oi-dashboard"></i> Kembali</a>
    </div>
</div>

<section class="products">
    <div class="card">
        <div class="card-header text-center" style="background-color: #fff;">
            <img src="{{ asset('images/' .$product->image) }}" width="200" height="200">
        </div>

        <div class="card-body">
            <p>{{ $product->description }}</p>
        </div>
    </div>
</section>
@endsection