@extends('layouts.base')

@section('content')
    <section class="detail-news">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title article-header text-center">{{ \Illuminate\Support\Str::title($news->title) }}</h3>
                    <p class="text-center creator-info">
                        Ditulis oleh <span class="created__by bold">{{ $news->getUser->name }}</span>, dipublikasi pada <span class="created__at bold">{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</span> dalam kategori <span class="category helvetica-bold">{{ $news->category_news[0]->name_category }}</span>
                    </p>
                </div>
                <div class="card-body article-body">
                    <div class="text-center mt-3 mb-5">
                        <img alt="ini-gambar" src="{{ asset('images/news_images/' .$news->image) }}" class="img-article">
                    </div>
                    
                    <div class="description">
                        {!! $news->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        .detail-news .container .card .card-body .description p {
            text-align: justify;
        }
    </style>
@endpush