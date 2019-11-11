@extends('layouts.base')

@include('layouts.jumbotron-career')

@section('content')
<section class="career">
    <div class="container">
        <div class="career-body">
            <div class="row">
                <div class="col-md-12 column-one">
                    @foreach($career as $c)
                    <div class="card">
                        <div class="card-header text-center">
                            {{ $c->job_title }}
                        </div>
                        <div class="card-body">
                            {!! $c->job_description !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection