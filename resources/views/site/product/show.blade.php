@extends('site.layouts.app')

@section('title')
    Product
@endsection

@section('page-title')
    Product Detail
@endsection

@section('content-page')
    <section class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="oi oi-chevron-left"></i></a>
            </div>

            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('images/products/'. $product->image) }}" width="150" class="mb-5" alt="" srcset="">
                </div>

                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td>
                            {!! $product->description !!}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection