@extends('site.layouts.app')

@section('title')
    Pricing
@endsection

@section('page-title')
    Tambah Harga
@endsection

@section('content-page')

<div style="margin-top: 20px; margin-bottom: 20px;">
    @include('message.flash-message')
</div>

<div class="form-pricing-input card">
    <div class="card-header">
        <a href="{{ route('pricing.index') }}">
            <button class="btn btn-primary"><i class="oi oi-chevron-left"></i></button>
        </a>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'pricing.store']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Jenis :') !!}
            {!! Form::text('title', '', ['class' => 'form-control']) !!}

            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('optional_description', 'Deskripsi (Opsional) :') !!}
            {!! Form::textarea('optional_description', '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Harga :') !!}
            {!! Form::number('price', '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Deskripsi :') !!}
            {!! Form::textarea('description', '', ['class' => 'form-control']) !!}

            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="button mt-4">
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>

        {!! Form::close() !!}
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