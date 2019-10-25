@extends('site.layouts.app')

@section('title')
    Testimonial
@endsection

@section('page-title')
    Testimonial Detail
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
        <table class="table">
            <tr>
                <td>Client Name</td>
                <td>:</td>
                <td>
                    {{ $testimonial->client_name }}
                </td>
            </tr>
            <tr>
                <td>Review</td>
                <td>:</td>
                <td>
                    {!! $testimonial->review !!}
                </td>
            </tr>
        </table>
    </section>
</div>
@endsection