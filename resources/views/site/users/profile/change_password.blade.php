@extends('site.layouts.app')

@section('title')
    My Profile
@endsection

@section('page-title')
    Profile Management
@endsection

@section('content-page')

@if ( session('success') )
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('success') }}
    </div>
@elseif( session('error') )
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Error!</h4>
        {{ session('error') }}
    </div>
@endif

<div class="card border-primary">
        <div class="card-header text-white bg-primary mb-3">
            <div class="card-title pull-left">
                <div class="float-left">
                    Change Your Password
                </div>
                <div class="float-right">
                    <a href="{{ route('home') }}" class="btn btn-outline-warning"><span class="oi oi-home"></span> Home</a>
                </div>
            </div>
            
        </div>

<div class="card-body bg-secondary-lighter">
        <form action="{{ route('update-password', Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="password"><strong> New Password </strong></label>
                <input type="password" class="form-control {{ $errors->first('password') ? "is-invalid": "" }}" name="password" placeholder="New Password">
                
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation"><strong> Password Confirmation </strong></label>
                <input type="password" class="form-control {{ $errors->first('password_confirmation') ? "is-invalid": "" }}" name="password_confirmation" placeholder="Password Confirmation">
                
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </div>
            </div>
        <div class="card-footer">
            <button class="float-right btn btn-outline-primary">Save</button>
            
            <a class="btn btn-outline-danger" href="{{ route('my-profile', Auth::user()->id) }}">Change Profile</a>
        </form>
    </div>
</div>
@endsection