{{-- Jumbotron here --}}
@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 jumbo-content">
                    <h3 class="display-4" style="font-size: 35pt;">IT SOLUTION</h3>
                    <p class="lead" style="text-align: justify;">
                        Jasa perbaikan komputer, laptop, install ulang windows dan lain-lain. Info lebih lanjut hubungi kami.
                    </p>
                </div>

                <div class="col-md-6 col-sm-12 jumbo-img">
                    <img src="{{ asset('images/header-bg.svg') }}" class="animate" alt="company" srcset="">
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