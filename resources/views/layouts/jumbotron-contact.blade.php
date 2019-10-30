{{-- Jumbotron here --}}
@section('jumbotron')
    <div class="jumbotron-contact">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12 col-sm-12 jumbo-img text-center">
                    <img src="{{ asset('images/contact.svg') }}" alt="news-image" srcset="">
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- style for this jumbotron --}}
@push('style')
    <style>
        .jumbotron-contact {
            width: 100%;
            height: 450px;
            background-color: #7C32FF !important;
        }

        .jumbotron-contact .container {
            position: relative;
            top: 5.5rem;
        }

        .jumbotron-contact .container .row .jumbo-img img {
            width: 30rem;
        }
    </style>
@endpush