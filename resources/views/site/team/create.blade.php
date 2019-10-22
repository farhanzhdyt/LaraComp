@extends('site.layouts.app')

@section('title')
    Team
@endsection

@section('page-title')
    Create Team
@endsection

@section('content-page')

<div class="message mt-3 mb-3">
    @include('message.flash-message')    
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4 my-3">
                <a href="{{ route('team.index') }}" class="btn btn-primary"><i class="oi oi-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <section class="team card-body">
        <form action="{{ route('team.store') }}" method="post">
            @csrf

            <table class="table">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><input type="number" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" name="nik" ></td>
                </tr>
                <tr>
                    <td>NAMA</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name"></td>
                </tr>
                <tr>
                    <td>ALAMAT</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address"></td>
                </tr>
                <tr>
                    <td>NO HANDPHONE</td>
                    <td>:</td>
                    <td><input type="number" class="form-control @error('phone_num') is-invalid @enderror" value="{{ old('phone_num') }}" name="phone_num"></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email"></td>
                </tr>
                <tr>
                    <td>POSISI</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" name="position"></td>
                </tr>
            </table>

            <div class="button-bottom mt-3">
                <button type="submit" class="btn btn-outline-primary">Create Data</button>    
            </div>
        </form>
    </section>
</div>
@endsection

@push('style')
    <style type="text/css">
        .form-control:focus {
            border: 1px solid;
        }
    </style>
@endpush