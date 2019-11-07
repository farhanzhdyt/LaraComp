@extends('site.layouts.app')

@section('title')
    Service
@endsection

@section('page-title')
    Show Detail of Service
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

    <section class="show card-body">

        <div class="image-team text-center mb-5">
            <img src="{{ asset('images/service/' .$service->image) }}" width="200" height="200" alt="" srcset="">
        </div>

        <table class="table table-bordered">
            <tr>
                <td>Name of Service</td>
                <td>:</td>
                <td>
                    {{ $service->title }}
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td>
                    {{ $service->description }}
                </td>
            </tr>
        </table>
    </section>
</div>
@endsection