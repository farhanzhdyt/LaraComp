@extends('site.layouts.app')

@section('title')
    Harga Layanan
@endsection

@section('page-title')
    Detail Harga
@endsection

@section('content-page')

<div class="card">
    <div class="card-header">
        <a href="{{ route('pricing.index') }}">
            <button class="btn btn-primary"><i class="oi oi-chevron-left"></i></button>
        </a>
    </div>
    
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Nama Layanan</td>
                <td>:</td>
                <td>{{ $pricing->title }}</td>
            </tr>

            <tr>
                <td>Deskripsi (opsional)</td>
                <td>:</td>
                <td>{{ $pricing->optional_description }}</td>
            </tr>

            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>{{ $pricing->price }}</td>
            </tr>

            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td>{{ $pricing->description }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection