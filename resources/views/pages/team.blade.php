@extends('layouts.base')

@include('layouts.jumbotron-team')

@section('content')
<section class="team">
    <div class="container">
        <h2 class="helvetica-bold text-center mb-5">Team <span class="helvetica-bold" style="color: #000;">Kami</span></h2>
        <div class="team-body">
            <div class="row">
                @foreach($team as $t)
                <div class="col-md-4 column-one" style="margin-top: 10px; margin-bottom: 10px;" data-aos="zoom-in">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ asset('images/teams/' .$t->image) }}" alt="" srcset="">
                        </div>
                        <div class="card-body">
                            {!! $t->name !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection