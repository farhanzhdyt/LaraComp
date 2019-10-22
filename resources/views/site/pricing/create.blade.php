@extends('site.layouts.app')

@section('title')
    Pricing
@endsection

@section('page-title')
    Insert New Service Price
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4 my-3">
                <a href="{{ route('pricing.index') }}" class="btn btn-primary"><i class="oi oi-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <section class="price card-body">
        <form action="{{ route('pricing.store') }}" method="post">
            @csrf

            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" ></td>
                </tr>
                <tr>
                    <td>Optional Description</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('optional_description') is-invalid @enderror" value="{{ old('optional_description') }}" name="optional_description"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>
                        <textarea class="form-control" name="description"></textarea>
                    </td>
                </tr>
            </table>

            <div class="button-bottom mt-3">
                <button type="submit" class="btn btn-outline-primary">Create Data</button>    
            </div>
        </form>
    </section>
</div>
@endsection

@push('style')
    <style type="text/css">
        .form-control:focus {
            border: 1px solid;
        }
    </style>
@endpush

@push('script')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush