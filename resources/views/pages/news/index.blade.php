@extends('layouts.base')

{{-- jumbotron --}}
@include('layouts.jumbotron-news')

@section('content')
    <section class="news">
        <div class="container">
            <div class="news-header">
                <h2 class="helvetica-bold">Artikel <span class="helvetica-bold" style="color: #000;">Terbaru</span></h2>
                <form action="{{ url()->current() }}" method="get">
                    <input type="text" name="keyword" class="form-control" id="" placeholder="Cari artikel">
                    <i class="fa fa-search"></i>
                </form>
            </div>
            <div class="row">
                @if($news->isEmpty())
                    <div class="error-message">
                        <img src="{{ asset('images/search.svg') }}" class="mb-5" width="260" alt="" srcset="">
                        <h5 class="message text-danger">Data tidak ditemukan!</h5>
                    </div>
                @endif
                @foreach ($news as $item)
                <div class="col-md-4 column" data-aos="zoom-in">
                    <div class="card">
                        <img src="{{ asset('images/news_images/' .$item->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('page.show', $item->slug) }}" class="card-title">
                                <h5>{{ \Illuminate\Support\Str::title($item->title) }}</h5>
                            </a>
                        </div>
                        <div class="card-footer" style="border: none; background: none;">
                            <small class="text-muted">
                                <b style="text-transform: uppercase;">{{ $item->category_news[0]->name_category }}</b>
                                <span style="text-transform: uppercase;">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
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

@push('style')
    <style>
        .news .container .news-header form {
            position: relative;
            margin: 30px auto;
        }

        .news .container .news-header form .fa-search {
            position: absolute;
            top: 7px;
            left: 9px;
            font-size: 20px;
        }

        .news .container .news-header form .form-control {
            padding: 10px 45px !important;
            border-radius: 0;
            transition: .3s;
        }

        .news .container .news-header form .form-control:focus {
            padding: 10px 35px !important;
        }

        .news .container .pagination {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .news .container .pagination .page-item {
            margin: auto 10px;
        }
        
        .news .container .pagination .page-item .page-link {
            border: transparent;
            font-size: 12pt;
            border-radius: 50px;
            transition: .3s;
            padding: 15px 20px;
        }

        .news .container .pagination .page-item .page-link:hover {
            background-color: #59BBEC;
            color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .news .container .pagination .page-item.active .page-link {
            background-color: #59BBEC;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
    </style>
@endpush