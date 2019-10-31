@extends('site.layouts.app')

@section('title')
    Career
@endsection

@section('page-title')
    Show Details Career
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
        <table class="table">
            <tr>
                <td>Job Title</td>
                <td>:</td>
                <td>
                    {{ $career->job_title }}
                </td>
            </tr>
            <tr>
                <td>Job Description</td>
                <td>:</td>
                <td>
                    {!! $career->job_description !!}
                </td>
            </tr>
        </table>
    </section>
</div>
@endsection
