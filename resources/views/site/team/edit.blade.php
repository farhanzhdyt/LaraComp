@extends('site.layouts.app')

@section('title')
    Team
@endsection

@section('page-title')
    Edit Team
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
        <form action="{{ route('team.update', $team->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="" style="display: block;">Image : </label>
                <img src="{{ asset('images/teams/' . $team->image) }}" width="100" alt="" srcset="">

                <input type="file" name="image" id="" class="form-control mt-2">
            </div>

            <table class="table table-bordered">
                <tr>
                    <td>Nik</td>
                    <td>:</td>
                    <td><input type="text" class="form-control @error('nik') is-invalid @enderror" value="{{ $team->nik }}" name="nik"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" value="{{ $team->name }}" class="form-control @error('name') is-invalid @enderror" name="name"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><input type="text" value="{{ $team->address }}" class="form-control @error('address') is-invalid @enderror" name="address"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>:</td>
                    <td><input type="number" value="{{ $team->phone_num }}" class="form-control @error('phone_num') is-invalid @enderror" name="phone_num"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="text" value="{{ $team->email }}" class="form-control @error('email') is-invalid @enderror" name="email"></td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td>:</td>
                    <td><input type="text" value="{{ $team->position }}" class="form-control @error('position') is-invalid @enderror" name="position"></td>
                </tr>
        </table>

            <div class="button-bottom mt-3">
                <button type="submit" class="btn btn-outline-primary">Edit Data</button>    
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