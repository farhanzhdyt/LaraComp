@extends('site.layouts.app')

@section('title')
    Profil Perusahaan
@endsection

@section('page-title')
    Profil Perusahaan
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('company.create') }}" class="btn btn-primary"><i class="oi oi-plus"></i> Tambah Data Profil Perusahaan</a>
    </div>
</div>

<div class="card mt-5">
    <div class="container">

    </div>
</div>

@endsection