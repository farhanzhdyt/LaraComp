{{-- Jumbotron here --}}
@section('jumbotron')
    <div class="jumbotron-news">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12 jumbo-content mt-5 text-white">
                    <h3 class="display-4 helvetica-bold" style="font-size: 30pt;">BERITA</h3>
                    <p>Berita terkini yang ada di laracomp. Jangan lewatkan informasi terbaru dari kami!</p>
                </div>

                <div class="col-md-6 col-sm-12 jumbo-img mt-5 text-center">
                    <img src="{{ asset('images/blog.svg') }}" alt="news-image" srcset="">
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- style for this jumbotron --}}
@push('style')
    <style>
        .jumbotron-news {
            width: 100%;
            height: 350px;
            background-color: #7C32FF !important;
        }

        .jumbotron-news .container {
            position: relative;
            top: 5.5rem;
        }

        .jumbotron-news .container .row .jumbo-img img {
            width: 15rem;
        }
    </style>
@endpush