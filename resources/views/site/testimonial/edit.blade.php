@extends('site.layouts.app')

@section('title')
    Testimonial
@endsection

@section('page-title')
    Edit Testimonial Data
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4 my-3">
                <a href="{{ route('testimonial.index') }}" class="btn btn-primary"><i class="oi oi-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <section class="card-body">
        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="post">
            @csrf
            @method('PATCH')

            <table class="table">
                <tr>
                    <td>Client Name </td>
                    <td>:</td>
                    <td>
                        <input type="text" value="{{ $testimonial->client_name }}" class="form-control @error('client_name') is-invalid @enderror" name="client_name">
                    </td>
                </tr>
                <tr>
                    <td>Review</td>
                    <td>:</td>
                    <td>
                        <textarea name="review" class="form-control @error('client_name') is-invalid @enderror" cols="30" rows="10">
                            {{ $testimonial->review }}
                        </textarea>
                    </td>
                </tr>
            </table>

            <div class="button-bottom mt-3">
                <button type="submit" class="btn btn-outline-primary">Edit Data</button>    
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
        CKEDITOR.replace('review');
    </script>
@endpush