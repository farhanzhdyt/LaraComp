@extends('layouts.base')

@include('layouts.jumbotron-contact')

@section('content')
{{-- Contact --}}
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="mb-5 helvetica-bold">Hubungi <span class="helvetica-bold" style="color: #000;">Kami</span></h2>

            @include('message.flash-message')

            <div class="row">
                <div class="col-md-12 mb-3 contact-form">
                    <form action="{{ route('contact-send') }}" method="post">

                        @csrf

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name">

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email">

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Subjek</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" name="subject">

                            @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pesan</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message">
                                {{ old('message') }}
                            </textarea>

                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-submit-contact-form">Kirim Pesan</button>
                    </form>
                </div>
            </div>
            <div class="row" style="margin-top: 80px;">
            	<div class="col-md-12">
            		<div class="google-maps-section">
		                <div id="map-container-google-1" class="z-depth-1-half map-container" style="display:block; height: 25rem;">
		                    <iframe src="https://maps.google.com/maps?q=Bandung&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
		                    style="border:0; width:100%;" allowfullscreen height="100%"></iframe>
		                </div>
		            </div>
            	</div>
            </div>
        </div>
    </section>
{{-- END Contact --}}
@endsection