{{-- Jumbotron here --}}
@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12 jumbo-content mt-5 text-white">
                    <h1 class="display-4 helvetica-bold">LARACOMP</h1>
                    <h3 class="display-4 helvetica-bold">IT SOLUTION</h3>
                    <p class="lead">
                        brand usaha kami di bidang IT yang memberikan layanan professional dan dibekali dengan tenaga ahli yang berpengalaman. Info lebih lanjut hubungi kami!
                    </p>
                </div>

                <div class="col-md-6 col-sm-12 jumbo-img mt-5">
                    <img src="{{ asset('images/ahay.png') }}" class="image-show" alt="" srcset="">
                </div>

                {{-- Mouse scroll down --}}
                <div class="scroll-downs">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                </div>
                {{-- END Mouse scroll down --}}
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        ScrollReveal().reveal('.image-show', {delay : 500});
    </script>
@endpush