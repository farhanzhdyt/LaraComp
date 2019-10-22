@extends('site.layouts.app')

@section('title')
    Team
@endsection

@section('page-title')
    Show Team
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

    <section class="pricing card-body">
        <table class="table table-bordered">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="nik" value="{{ $teams->nik }}" readonly=""></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="name" value="{{ $teams->name }}" readonly=""></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="address" value="{{ $teams->address }}" readonly=""></td>
            </tr>
            <tr>
                <td>NO HANDPHONE</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="phone_num" value="{{ $teams->phone_num }}" readonly=""></td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="email" value="{{ $teams->email }}" readonly=""></td>
            </tr>
            <tr>
                <td>POSISI</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="position" value="{{ $teams->position }}" readonly=""></td>
            </tr>
            <tr>
        </table>
    </section>
</div>
@endsection