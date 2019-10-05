@extends('layouts.app')

@include('layouts.jumbotron')

{{-- content page here --}}
@section('content')
    {{-- About Section --}}
    <section class="about" id="about">
        <div class="container">
            <div class="about-header">
                <h2>About</h2>
            </div>

            <div class="about-body">
                <div class="row">
                    <div class="col-md-6 about-info">
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti necessitatibus ex voluptates nihil accusamus hic vel. Voluptates illo excepturi sint sequi quod! Itaque autem aliquam earum! Quia, doloribus enim debitis cupiditate, possimus facere eveniet maxime, sit illo accusantium molestiae! Magnam rerum et enim ducimus cupiditate adipisci dignissimos, mollitia ipsa quo.</p>
                    </div>
                    <div class="col-md-6 about-img">
                        <img src="{{ asset('images/company.svg') }}" class="animate" alt="company" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END About Section --}}
@endsection

