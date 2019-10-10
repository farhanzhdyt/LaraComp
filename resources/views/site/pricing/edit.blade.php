@extends('site.layouts.app')

@section('title')
    Harga Layanan
@endsection

@section('page-title')
    Ubah Harga
@endsection

@section('content-page')

@include('message.flash-message')

<div class="card mt-4">
    <div class="card-header">
        <a href="{{ route('pricing.index') }}">
            <button class="btn btn-primary"><i class="oi oi-chevron-left"></i></button>
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('pricing.update', $pricing->id) }}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $pricing->id }}">

        <div class="form-group">
            <label>Nama Layanan</label>
            <input type="text" class="form-control" name="title" value="{{ $pricing->title }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi (Opsional)</label>
            <input type="text" class="form-control" name="optional_description" value="{{ $pricing->optional_description }}">
            @error('optional_description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="price" value="{{ $pricing->price }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="description" value="{{ $pricing->description }}">
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="button">
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>

        </form>
    </div>
</div>

@endsection

@push('style')
    <style>
        label {
            display: inline-block;
            margin: 10px auto;
        }

        input {
            margin: 10px auto;
        }

        textarea {
            height: 80px;
        }

        .btn-success {
            width: 150px;
            padding-top: 9px;
            padding-bottom: 9px;
        }
    </style>
@endpush