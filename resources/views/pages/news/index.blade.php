@extends('layouts.base')

{{-- jumbotron --}}
@include('layouts.jumbotron-news')

@section('content')
    <section class="news">
        <div class="container">
            <div class="row">
                <div class="col-md-3 column">
                    @foreach ($news as $item)
                    <div class="card">
                        <img src="{{ asset('images/teams/gorilla.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('page.show', $item->slug) }}" class="card-title">
                                <h5>Card title</h5>
                            </a>
                        </div>
                        <div class="card-footer" style="border: none; background: none;">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection