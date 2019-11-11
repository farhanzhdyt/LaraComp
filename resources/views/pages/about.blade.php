@extends('layouts.base')

@include('layouts.jumbotron-about')

@section('content')
<section class="about">
    <div class="container">
        <div class="about-body">
            @foreach($laracomp as $comp)
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="mb-5 helvetica-bold">{{ $comp->company_name }}</h1>
                    <img src="{{ asset('images/company/'. $comp->image) }}" alt="" srcset="">
                </div>
                <div class="card-body">
                    <div class="group">
                        <label for="" class="helvetica-bold"># Sekilas Tentang <span class="helvetica-bold" style="color: #000;">Kami</span></label>
                        {!! $comp->company_history !!}
                    </div>
                    <div class="group">
                        <label for="" class="helvetica-bold"># Visi <span class="helvetica-bold" style="color: #000;">Kami</span></label>
                        {!! $comp->vission !!}
                    </div>
                    <div class="group">
                        <label for="" class="helvetica-bold"># Misi <span class="helvetica-bold" style="color: #000;">Kami</span></label>
                        {!! $comp->mission !!}
                    </div>
                    <div class="group">
                        <label for="" class="helvetica-bold"># Bergerak <span class="helvetica-bold" style="color: #000;">di Bidang</span></label>
                        {!! $comp->type_of_products !!}
                    </div>
                    <div class="group">
                        <label for="" class="helvetica-bold"># CEO</label>
                        {!! $comp->owner !!}
                    </div>
                    <div class="group">
                        <label for="" class="helvetica-bold"># Berdiri <span class="helvetica-bold" style="color: #000;">Tahun</span></label>
                        {!! \Carbon\Carbon::parse($comp->launched)->format("Y") !!}
                    </div>
                    <div class="group">
                        <label for="" class="helvetica-bold"># Negara</label>
                        {!! $comp->country !!}
                    </div>
                    <div class="group">
                        <label for="" class="helvetica-bold"># Alamat</label>
                        {!! $comp->company_address !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection