@extends('site.layouts.app')

@section('title')
    Career
@endsection

@section('page-title')
    Edit Career
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4 my-3">
                <a href="{{ route('career.index') }}" class="btn btn-primary"><i class="oi oi-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <section class="price card-body">
        <form action="{{ route('career.update', $career->id) }}" method="post">
            @csrf
            @method('PATCH')

            <table class="table">
                <tr>
                    <td>Job Title</td>
                    <td>:</td>
                    <td>
                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" value="{{ $career->job_title }}" name="job_title">
                    </td>
                </tr>
                <tr>
                    <td>Job Description</td>
                    <td>:</td>
                    <td>
                        <textarea class="form-control" name="job_description">
                            {{ $career->job_description }}
                        </textarea>
                    </td>
                </tr>
            </table>

            <div class="button-bottom mt-3">
                <button type="submit" class="btn btn-outline-primary">Update Data</button>    
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
        CKEDITOR.replace('job_description');
    </script>
@endpush