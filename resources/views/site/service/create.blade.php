@extends('site.layouts.app')

@section('title')
    Service
@endsection

@section('page-title')
    Create New Service
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4 my-3">
                <a href="{{ route('service.index') }}" class="btn btn-primary"><i class="oi oi-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <section class="service card-body">
        <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <table class="table">
                <tr>
                    <td>Image</td>
                    <td>:</td>
                    <td><input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" name="image"></td>
                </tr>
                <tr>
                    <td>Name Of Service</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" ></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
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