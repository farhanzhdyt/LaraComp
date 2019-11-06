@extends('layouts.base')

{{-- jumbotron --}}
@include('layouts.jumbotron-news')

@section('content')
    <section class="news">
        <div class="container">
            <div class="news-header">
                <h2 class="helvetica-bold">Artikel <span class="helvetica-bold" style="color: #000;">Terbaru</span></h2>
            </div>
            <div class="row">
                @foreach ($news as $item)
                <div class="col-md-3 column">
                    <div class="card">
                        <img src="{{ asset('images/news_images/' .$item->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('page.show', $item->slug) }}" class="card-title">
                                <h5>{{ \Illuminate\Support\Str::title($item->title) }}</h5>
                            </a>
                        </div>
                        <div class="card-footer" style="border: none; background: none;">
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }} , By
                                {{ $item->getUser->name }}
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{ $news->links() }}
        </div>
    </section>
@endsection