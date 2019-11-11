{{-- Jumbotron here --}}
@section('jumbotron')
    <div class="jumbotron-about">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    <h2 class="display-4 helvetica-bold">Tentang Kami</h2>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- style for this jumbotron --}}
@push('style')
    <style>
        .jumbotron-about {
            width: 100%;
            height: 350px;
            background-color: #7C32FF !important;
        }

        .jumbotron-about .container {
            position: relative;
            top: 5.5rem;
        }

        .jumbotron-about .container .row .col-md-12 h2 {
            text-align: center;
            line-height: 10rem;
            color: #fff;
        }
    </style>
@endpush